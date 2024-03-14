<?php

namespace App\Services\Bitrix\Data\Chats;

use App\Services\Bitrix\Data\Castables\ContactCast;
use Illuminate\Support\Str;
use Spatie\LaravelData\Attributes\MapInputName;
use Spatie\LaravelData\Attributes\WithCast;
use Spatie\LaravelData\Data;

class BitrixTenantChatData extends Data
{
    public function __construct(
        public ?int $id,
        public ?string $bx_chat_uid,
        public ?int $bx_chat_id,
        public ?int $bx_user_id,
        #[MapInputName("bx_user_id")]
        #[WithCast(ContactCast::class)]
        public ?BitrixChatUserData $user,
        public ?int $bx_chat_user_id,
        public ?\DateTime $updated_at,
    ) {
        self::chatUid();
        $this->updated_at = now();
    }

    protected function chatUid()
    {
        if (empty($this->bx_chat_uid)) {
            $this->bx_chat_uid = "chat" . Str::ulid();
        }
    }

}
