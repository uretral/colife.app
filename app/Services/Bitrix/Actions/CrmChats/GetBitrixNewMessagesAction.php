<?php


namespace App\Services\Bitrix\Actions\CrmChats;


use App\Services\Bitrix\Actions\AbstractBitrixGetAction;
use App\Services\Bitrix\Chats\BitrixChatService;
use App\Services\Bitrix\Helpers\BitrixHelper;
use App\Services\Bitrix24\Entity\ImEntity;
use Illuminate\Support\Facades\Log;

/**
 * Class GetBitrixNewMessagesAction
 * @package App\Services\Bitrix\Actions\CrmDeals
 */
class GetBitrixNewMessagesAction extends AbstractBitrixGetAction
{

    public function run(): array
    {
        try {
            $api = new ImEntity($this->bitrix);
            $response = $api->getOfflineEvents();
            return $response['result']['events'];
        } catch (\Exception $e) {
            Log::channel('bitrix')->error($e->getMessage());
            throw new \Exception('Ошибка получения Событий: ' . PHP_EOL . $e->getMessage());
        }
    }


}
