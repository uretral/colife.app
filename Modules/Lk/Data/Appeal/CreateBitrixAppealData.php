<?php

namespace Modules\Lk\Data\Appeal;

use Modules\Lk\Data\Casts\AppealContactCast;
use Modules\Lk\Data\Casts\AppealPriorityCast;
use Modules\Lk\Data\Casts\AppealTitleCast;
use App\Services\Bitrix\Data\CrmContact\BitrixCrmContactData;
use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\Attributes\MapInputName;
use Spatie\LaravelData\Attributes\WithCast;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\DataCollection;

class CreateBitrixAppealData extends Data
{
    public function __construct(

        #[MapInputName('theme')]
        #[WithCast(AppealTitleCast::class)]
        public ?string $title,

        #[MapInputName('bitrix')]
        public ?array $chat,

        #[MapInputName('users')]
        #[WithCast(AppealContactCast::class)]
        public ?BitrixCrmContactData $user,

        #[MapInputName('theme')]
        #[WithCast(AppealPriorityCast::class)]
        public ?string $priority,

        public ?int $unit_id,
        #[MapInputName('lastMessage')]
        public ?AppealMessageData $message,

        #[MapInputName('message.files')]
        #[DataCollectionOf(AppealMessageFileData::class)]
        public ?DataCollection $files,

        public ?int $category_id,
        public ?string $stage_id = "new",
        public int $opportunity = 0,
    ) {
        $this->category_id = config('bitrix24.B24_DEAL_APPEALS_ID');
    }

}



