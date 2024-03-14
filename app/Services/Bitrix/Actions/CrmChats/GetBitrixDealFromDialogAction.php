<?php


namespace App\Services\Bitrix\Actions\CrmChats;


use App\Services\Bitrix\Actions\AbstractBitrixGetAction;
use App\Services\Bitrix\Chats\BitrixChatService;
use App\Services\Bitrix\Helpers\BitrixHelper;
use App\Services\Bitrix24\Entity\ImEntity;
use Illuminate\Support\Facades\Log;

/**
 * Class GetBitrixDealFromDialogAction
 * @package App\Services\Bitrix\Actions\CrmDeals
 */
class GetBitrixDealFromDialogAction extends AbstractBitrixGetAction
{

    public function run(string $chatId, int $userId, int $line ): int
    {
        try {

            $api = new ImEntity($this->bitrix);
            $chatEnitityID = BitrixChatService::getBitrixChatId($line, $chatId, $userId);
            $bitrixChatId = $api->getChat($chatEnitityID)['result']['ID'];
            $response = $api->get($bitrixChatId);
            return BitrixHelper::getDealIdFromDialog($response['result']);
        } catch (\Exception $e) {
            Log::channel('bitrix')->error($e->getMessage());
            throw new \Exception('Ошибка получения ID сделки: ' . PHP_EOL . $e->getMessage());
        }
    }


}
