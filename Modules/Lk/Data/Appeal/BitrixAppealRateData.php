<?php

namespace Modules\Lk\Data\Appeal;

use Modules\Lk\Data\Casts\ChatContactCast;
use Modules\Lk\Data\Chat\BitrixChatChatData;
use Modules\Lk\Data\Chat\BitrixChatConactData;
use Spatie\LaravelData\Attributes\MapInputName;
use Spatie\LaravelData\Attributes\WithCast;
use Spatie\LaravelData\Data;

class BitrixAppealRateData extends Data
{
    public function __construct(

        #[MapInputName('bitrix')]
        public ?BitrixChatChatData $chat,

        #[MapInputName('users')]
        #[WithCast(ChatContactCast::class)]
        public ?BitrixChatConactData $user,

        #[MapInputName('lastMessage')]
        public ?BitrixAppealRateMessageData $message,

    ) {
    }

}



