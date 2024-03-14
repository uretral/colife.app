<?php

namespace App\Services\Bitrix\Data\Chats;

use Spatie\LaravelData\Attributes\MapInputName;
use Spatie\LaravelData\Attributes\MapOutputName;
use Spatie\LaravelData\Attributes\Validation\Nullable;
use Spatie\LaravelData\Data;

class BitrixSendMessageData extends Data
{
    public function __construct(

        #[Nullable]
        #[MapInputName("user")]
        public ?BitrixChatUserData $user,

        #[MapInputName("message")]
        public ?BitrixChatMessageData $message,

        #[MapInputName("chat")]
        public ?BitrixChatData $chat,
    ) {
    }


}
