<?php


namespace App\Services\Bitrix\Actions\CrmChats;


use App\Services\Bitrix\Actions\AbstractBitrixGetAction;
use App\Services\Bitrix\Chats\BitrixChatService;
use App\Services\Bitrix\Data\Chats\BitrixSendMessageData;
use Illuminate\Support\Facades\Log;

class SendBitrixGroupChatMessageAction extends BitrixChatMessageAction implements IChatMessage
{

    public function getLine()
    {
        $this->line = config('bitrix24.B24_LINE_GROUP_CHAT_ID');
    }
}
