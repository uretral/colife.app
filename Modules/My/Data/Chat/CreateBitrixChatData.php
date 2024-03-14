<?php

namespace Modules\My\Data\Chat;

use  Modules\My\Data\Casts\ChatContactCast;
use Modules\My\Data\Casts\TitleCast;
use Modules\My\Data\Request\RequestMessageFileData;
use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\Attributes\MapInputName;
use Spatie\LaravelData\Attributes\WithCast;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\DataCollection;

class CreateBitrixChatData extends Data
{
    public function __construct(

        public mixed $request_id,
        public mixed $code,

        #[MapInputName('theme')]
        #[WithCast(TitleCast::class)]
        public ?string $title,

        #[MapInputName('theme.priority.title')]
        public ?string $priority,

        #[MapInputName('message.files')]
        #[DataCollectionOf(RequestMessageFileData::class)]
        public ?DataCollection $files,

        #[MapInputName('bitrix')]
        public ?BitrixChatChatData $chat,

        #[MapInputName('users')]
        #[WithCast(ChatContactCast::class)]
        public ?BitrixChatConactData $user,

        #[MapInputName('lastMessage')]
        public ?BitrixChatMessageData $message,

        public ?string $stage_id = "new",
        public int $opportunity = 0,

    ) {
    }
}


