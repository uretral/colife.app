<?php


namespace App\Services\Bitrix\Actions\CrmChats;


use App\Services\Bitrix\Actions\AbstractBitrixGetAction;
use App\Services\Bitrix\Chats\BitrixChatService;
use App\Services\Bitrix\Data\Chats\BitrixSendMessageData;
use App\Services\Bitrix24\Bitrix;
use Illuminate\Support\Facades\Log;

class BitrixChatMessageAction extends AbstractBitrixGetAction
{

    /**
     * @var \Illuminate\Config\Repository|\Illuminate\Contracts\Foundation\Application|mixed
     */
    protected mixed $line;

    /**
     * @throws \Exception
     */
    public function run(array $messageData ): int
    {
        try {

            $this->getLine();
            $messageDto = BitrixSendMessageData::from($messageData);
            $chat = app(BitrixChatService::class);

            Log::channel('bitrix')->info("LINE: " . $this->line);
            Log::channel('bitrix')->info(json_encode($messageDto->toArray()));
            $response = $chat->sendMessages($messageDto->toArray(), $this->line);

            if ($response['result']['SUCCESS'] == true){
                return (int) $response['result']['DATA']['RESULT'][0]['user'];
            }

            throw new \Exception("Ошибка отправки сообщения " . json_encode($response));


        } catch (\Exception $e) {
            Log::channel('bitrix')->error("Ошибка отправки сообщения:" . $e->getMessage());
            throw new \Exception($e->getMessage());
        }
    }

    public function getLine(){}

}
