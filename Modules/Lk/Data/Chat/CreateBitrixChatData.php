<?php

namespace Modules\Lk\Data\Chat;

use Modules\Lk\Data\Appeal\AppealMessageFileData;
use Modules\Lk\Data\Casts\AppealTitleCast;
use  Modules\Lk\Data\Casts\ChatContactCast;
use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\Attributes\MapInputName;
use Spatie\LaravelData\Attributes\WithCast;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\DataCollection;

class CreateBitrixChatData extends Data
{
    public function __construct(

        #[MapInputName('theme')]
        #[WithCast(AppealTitleCast::class)]
        public ?string $title,

        #[MapInputName('theme.priority.title')]
        public ?string $priority,

        #[MapInputName('message.files')]
        #[DataCollectionOf(AppealMessageFileData::class)]
        public ?DataCollection $files,

        #[MapInputName('bitrix')]
        public ?BitrixChatChatData $chat,

        #[MapInputName('users')]
        #[WithCast(ChatContactCast::class)]
        public ?BitrixChatConactData $user,

        #[MapInputName('lastMessage')]
        public ?BitrixChatMessageData $message,

        public ?int $category_id,
        public ?string $stage_id = "new",
        public int $opportunity = 0,

    ) {
        $this->category_id = config('bitrix.'. app()->getLocale().'.B24_DEAL_MY_APPEALS_ID') ?? 0;
    }

}



