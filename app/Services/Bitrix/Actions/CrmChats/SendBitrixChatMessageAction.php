<?php


namespace App\Services\Bitrix\Actions\CrmChats;

class SendBitrixChatMessageAction  extends BitrixChatMessageAction implements IChatMessage
{

    public function getLine()
    {
        $this->line = config('bitrix24.B24_LINE_CHAT_ID');
    }
}
