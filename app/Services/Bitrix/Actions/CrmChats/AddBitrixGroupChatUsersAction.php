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
class AddBitrixGroupChatUsersAction extends AbstractBitrixGetAction
{

    /**
     * @param int $chatId - цифровой Идентификатор чата!
     * @param int $userId
     * @return int
     * @throws \Exception
     */
    public function run(int $chatId, int $userId): int
    {
        try {

            $api = new ImEntity($this->bitrix);
            $response = $api->addUsers($chatId,[$userId]);
            return !empty($response['result']);

        } catch (\Exception $e) {
            Log::channel('bitrix')->error($e->getMessage());
            throw new \Exception('Ошибка получения ID чата: ' . PHP_EOL . $e->getMessage());
        }
    }


}
