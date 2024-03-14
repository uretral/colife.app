<?php


namespace App\Services\Bitrix\Chats;


use App\Models\User;
use App\Services\Bitrix\Actions\CrmChats\GetBitrixChatIdAction;
use App\Services\Bitrix\Actions\CrmChats\GetBitrixDealFromDialogAction;
use App\Services\Bitrix\Actions\CrmChats\GetBitrixGroupChatIdAction;
use App\Services\Bitrix\Actions\CrmChats\GetBitrixNewMessagesAction;
use App\Services\Bitrix\Actions\CrmChats\SendBitrixChatMessageAction;
use App\Services\Bitrix\Actions\CrmChats\SendBitrixGroupChatMessageAction;
use App\Services\Bitrix\Actions\CrmChats\SetBitrixMessagesDeliveredAction;
use App\Services\Bitrix\BitrixService;
use App\Services\Bitrix\Data\Apartment\BitrixApartmentChatData;
use App\Services\Bitrix\Data\Chats\BitrixEventChatMessageData;
use App\Services\Bitrix\Data\Chats\BitrixTenantChatData;
use App\Services\Bitrix\Helpers\BitrixHelper;
use App\Services\Bitrix\Models\BitrixApartmentChat;
use App\Services\Bitrix\Models\BitrixCrmItem;
use App\Services\Bitrix\Models\BitrixTenantChat;
use App\Services\Bitrix24\Bitrix;
use App\Services\Bitrix24\Entity\ImEntity;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

/**
 * Class BitrixChatService
 * @package App\Services\Bitrix\Chats
 */
class BitrixChatService
{

    /**
     * Сохраняем сообщения чата
     * @param array $messages
     * @throws \Exception
     */
    public function sendMessages(array $message, $line = 18): array
    {
        try {
            $bitrix = app(Bitrix::class);
            $connector = new ImEntity($bitrix);
            $response = $connector->sendMessages($message,$line);
            Log::channel('bitrix')->info(json_encode($response));
            return $response;

        } catch (\Exception $e) {
            throw new \Exception("Ошибка сохранения сообщений чата: " . $e->getMessage());
        }
    }

    /**
     * Для реализации на файлах, тест
     * @var string
     */
    protected string $chatDir = 'chats';

    protected function getChatFile($chatID): string
    {
        return $this->chatDir . DIRECTORY_SEPARATOR . $chatID . ".json";
    }

    /**
     * @return string
     */
    public function getConnectorID(): string
    {
        return config('bitrix24.B24_CONNECTOR_ID');
    }

    /**
     * Тестовая реализация на файла -> после ОК переделать БД
     * @param $chatID
     * @return mixed
     * @throws \Exception
     */
    public function getChat($chatID): mixed
    {
        try {
            $file = self::getChatFile($chatID);
            $result = [];

            if (Storage::exists($file)) {
                $result = json_decode(Storage::get($file), 1);
            }

            return $result;
        } catch (\Exception $e) {
            throw new \Exception('Ошибка доступа к чату: ' . $e->getMessage());
        }
    }

    /**
     * Тестовая реализация на файла -> после ОК переделать БД
     * @param $chatID
     * @param $arMessage
     * @return false|int
     */
    public function saveMessage($chatID, $arMessage): bool|int
    {
        $arMessages = $this->getChat($chatID);
        $count = count($arMessages);
        $arMessages['message' . $count] = $arMessage;
        $saved = Storage::put(self::getChatFile($chatID), json_encode($arMessages));

        return !empty($saved)
            ? $count
            : false;
    }

    /**
     * @return mixed
     */
    public function getAppealsLine(): mixed
    {
        return config('bitrix24.B24_LINE_APPEALS_ID');
    }


    /**
     * @param $lineId
     * @return mixed
     * @deprecated
     * Вероятно не понадобится
     */
    public function setAppealsLine($lineId): mixed
    {
        return config('bitrix24.B24_LINE_APPEALS_ID');
    }


    /**
     * Конвертер
     * @param $var
     * @return array|string|null
     */
    function convertBB($var): array|string|null
    {
        $search = array(
            '/\[b\](.*?)\[\/b\]/is',
            '/\[br\]/is',
            '/\[i\](.*?)\[\/i\]/is',
            '/\[u\](.*?)\[\/u\]/is',
            '/\[img\](.*?)\[\/img\]/is',
            '/\[url\](.*?)\[\/url\]/is',
            '/\[url\=(.*?)\](.*?)\[\/url\]/is'
        );
        $replace = array(
            '<strong>$1</strong>',
            '<br>',
            '<em>$1</em>',
            '<u>$1</u>',
            '<img src="$1" />',
            '<a href="$1">$1</a>',
            '<a href="$1">$2</a>'
        );
        $var = preg_replace($search, $replace, $var);
        return $var;
    }

    /**
     * Последовательность $line | $chatId | $user_id
     * В итоге получаем нечто: colife_ru_chat|18|chat94d6698d427bec03d4|772
     * @param ...$vars
     * @return string
     */
    public static function getBitrixChatId(...$vars): string
    {
        $chatId = [config('bitrix24.B24_CONNECTOR_ID')];
        return implode("|", array_merge($chatId, $vars));
    }

    public static function getDealId(string $chatId, int $userId): int
    {
        try {
            $line = config('bitrix24.B24_LINE_APPEALS_ID');
            return app(GetBitrixDealFromDialogAction::class)->run($chatId, $userId, $line);
        } catch (\Exception $e) {
            throw new \Exception(
                'Ошибка обработки чата: '
                . $chatId
                . PHP_EOL
                . $e->getMessage()
            );
        }
    }

    /**
     *
     * @param int $dealId
     * @param array $payload
     * @return array|null
     */
    public static function createDeal(int $dealId, array $payload): ?array
    {
        return BitrixService::storeBitrixDeal($dealId,$payload);
    }

    public static function getNewChatMessages(){
        return app(GetBitrixNewMessagesAction::class)->run();
    }

    public static function setDeliveredStatus(BitrixEventChatMessageData $message, $messageIds, $chatId): bool
    {
        $response =  app(SetBitrixMessagesDeliveredAction::class)->run($message->im->toArray(),[$messageIds],$chatId);
        return !empty($response['SUCCESS']);
    }


    /**
     * @param BitrixCrmItem $apartment
     * @return mixed
     * @throws \Exception
     */
    public static function createGroupChat(BitrixCrmItem $apartment): BitrixApartmentChat
    {
        try {
            if(!$apartmentChat = BitrixApartmentChat::where("bx_apartment_id", $apartment->apartmentId)->first()){

                $chatDto = BitrixApartmentChatData::from([
                    "title" => $apartment->title,
                    "bx_apartment_id" => $apartment->apartmentId,
                ]);

                // Формирование данных для группового чата
                $messageDto = BitrixHelper::apartmentChatMessage($chatDto);
                // Отправка первого сообщения и получение ID битрикс пользователя
                $chatDto->bx_chat_user_id = app(SendBitrixGroupChatMessageAction::class)->run($messageDto->toArray());
                // Получение int id чата для последующего добавления пользователей
                $chatDto->bx_chat_id = app(GetBitrixGroupChatIdAction::class)->run($chatDto->bx_chat_uid,$chatDto->bx_chat_user_id);

                $apartmentChat = BitrixApartmentChat::create($chatDto->toArray());
            }

            return $apartmentChat;

        } catch (\Exception $e){
            throw new \Exception("Ошибка создания группового чата: "
                . $apartment->title
                . PHP_EOL
                . $e->getMessage()
            );
        }
    }

    public static function addUsersToGroupChat(BitrixApartmentChat $apartmentChat): bool
    {
        try {
            $bitrix = app(Bitrix::class);
            $api = new ImEntity($bitrix);
            $users = $apartmentChat->users()->pluck("bx_user_id")->toArray();
            $r = $api->addUsers($apartmentChat->bx_chat_id,$users);
            Log::channel('bitrix')->info("Добавление пользователей в квартирный чат:" . json_encode($r));
            return true;

        } catch (\Exception $e){
            Log::channel('bitrix')->error("ОШИБКА: Добавлениz пользователей в квартирный чат:" .$e->getMessage());
            return true;
        }


    }


    public static function createTenantChat($bxContactId)
    {
        try {
            if(!$tenantChat = BitrixTenantChat::where("bx_user_id", $bxContactId)->first()){

                $chatDto = BitrixTenantChatData::from([
                    "bx_user_id" => $bxContactId,
                ]);

                // Формирование данных для чата жильца
                $messageDto = BitrixHelper::tenantChatMessage($chatDto);
                // Отправка первого сообщения и получение ID битрикс пользователя
                $chatDto->bx_chat_user_id = app(SendBitrixChatMessageAction::class)->run($messageDto->toArray());
                // Получение int id чата
                $chatDto->bx_chat_id = app(GetBitrixChatIdAction::class)->run($chatDto->bx_chat_uid,$chatDto->bx_chat_user_id);
                $tenantChat = BitrixTenantChat::create($chatDto->toArray());
            }

            return $tenantChat->bx_chat_user_id;

        } catch (\Exception $e){
            throw new \Exception("Ошибка создания чата жильца: "
                . PHP_EOL
                . $e->getMessage()
            );
        }
    }

}
