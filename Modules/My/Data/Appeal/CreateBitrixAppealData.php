<?php

namespace Modules\My\Data\Appeal;

use Modules\My\Data\Casts\AppealContactCast;
use Modules\My\Data\Casts\AppealPriorityCast;
use Modules\My\Data\Casts\AppealTitleCast;
use App\Services\Bitrix\Data\CrmContact\BitrixCrmContactData;
use Modules\My\Data\Casts\ChatContactCast;
use Modules\My\Data\Chat\BitrixChatChatData;
use Modules\My\Data\Chat\BitrixChatConactData;
use Modules\My\Data\Chat\BitrixChatMessageData;
use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\Attributes\MapInputName;
use Spatie\LaravelData\Attributes\WithCast;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\DataCollection;

class CreateBitrixAppealData extends Data
{
    public function __construct(

        public mixed $code,

        #[MapInputName('theme')]
        #[WithCast(AppealTitleCast::class)]
        public ?string $title,

        #[MapInputName('bitrix')]
        public ?BitrixChatChatData $chat,

        #[MapInputName('users')]
        #[WithCast(ChatContactCast::class)]
        public ?BitrixChatConactData $user,

        #[MapInputName('theme.priority.title')]
        public ?string $priority,

        public ?int $unit_id,
        #[MapInputName('lastMessage')]
        public ?BitrixChatMessageData $message,

        #[MapInputName('message.files')]
        #[DataCollectionOf(AppealMessageFileData::class)]
        public ?DataCollection $files,

        public ?int $category_id,
        public ?string $stage_id = "new",
        public int $opportunity = 0,
    ) {
        $this->category_id = config('bitrix24.B24_DEAL_MY_APPEALS_ID');
    }

}



