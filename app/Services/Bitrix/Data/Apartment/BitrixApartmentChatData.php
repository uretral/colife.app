<?php

namespace App\Services\Bitrix\Data\Apartment;

use Illuminate\Support\Str;
use Spatie\LaravelData\Data;

class BitrixApartmentChatData extends Data
{
    public function __construct(
        public ?int $id,
        public ?string $title,
        public ?int $bx_apartment_id,
        public ?string $bx_chat_uid,
        public ?int $bx_chat_id,
        public ?int $bx_user_id,
        public ?int $bx_chat_user_id,
    ) {
        self::chatUid();
    }

    protected function chatUid()
    {
        if (empty($this->bx_chat_uid)) {
            $this->bx_chat_uid = "chat" . Str::ulid();
        }
    }

}
