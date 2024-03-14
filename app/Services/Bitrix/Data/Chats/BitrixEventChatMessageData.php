<?php

namespace App\Services\Bitrix\Data\Chats;

use Spatie\LaravelData\Attributes\MapInputName;
use Spatie\LaravelData\Attributes\Validation\Nullable;
use Spatie\LaravelData\Data;

class BitrixEventChatMessageData extends Data
{
    public function __construct(

        #[Nullable]
        #[MapInputName("im")]
        public ?BitrixChatImData $im,

        #[MapInputName("message")]
        public ?BitrixChatMessageData $message,

        #[MapInputName("chat")]
        public ?BitrixChatData $chat,
    ) {

    }


}
