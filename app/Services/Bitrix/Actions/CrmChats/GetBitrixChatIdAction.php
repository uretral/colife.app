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
class GetBitrixChatIdAction extends AbstractBitrixGetAction implements IChatMessage
{

    protected int $line;

    public function run(string $chatId, int $userId): int
    {
        try {
            $this->getLine();
            $api = new ImEntity($this->bitrix);
            $chatEnitityID = BitrixChatService::getBitrixChatId($this->line, $chatId, $userId);
            return $api->getChat($chatEnitityID)['result']['ID'];

        } catch (\Exception $e) {
            Log::channel('bitrix')->error($e->getMessage());
            throw new \Exception('Ошибка получения ID чата: ' . PHP_EOL . $e->getMessage());
        }
    }

    public function getLine(){
        $this->line = config('bitrix24.B24_LINE_CHAT_ID');
    }


}
