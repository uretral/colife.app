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
class GetBitrixGroupChatIdAction extends GetBitrixChatIdAction
{
    public function getLine(){
        $this->line = config('bitrix24.B24_LINE_GROUP_CHAT_ID');
    }


}
