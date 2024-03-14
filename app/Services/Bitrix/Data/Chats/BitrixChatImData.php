<?php

namespace App\Services\Bitrix\Data\Chats;

use Spatie\LaravelData\Data;

class BitrixChatImData extends Data
{
    public function __construct(
        public ?int $chat_id,
        public ?int $message_id,

    ) {
    }

}
