<?php


namespace App\Services\Bitrix\Actions\CrmChats;


use App\Services\Bitrix\Actions\AbstractBitrixGetAction;
use App\Services\Bitrix\Chats\BitrixChatService;
use App\Services\Bitrix\Helpers\BitrixHelper;
use App\Services\Bitrix24\Entity\ImEntity;
use Illuminate\Support\Facades\Log;

/**
 * Class SetBitrixMessagesDeliveredAction
 * @package App\Services\Bitrix\Actions\CrmDeals
 */
class SetBitrixMessagesDeliveredAction extends AbstractBitrixGetAction
{

    public function run($im,$messageIds,$chatId): array
    {
        try {

            $api = new ImEntity($this->bitrix);
            $response = $api->statusDelivered($im,$messageIds,$chatId);
            return $response['result'];
        } catch (\Exception $e) {
            Log::channel('bitrix')->error($e->getMessage());
            throw new \Exception('Ошибка получения ID сделки: ' . PHP_EOL . $e->getMessage());
        }
    }


}
