<?php

namespace Modules\My\Data\Request;

use Modules\My\Data\Casts\AppealContactCast;
use Modules\My\Data\Casts\AppealPriorityCast;
use Modules\My\Data\Casts\AppealTitleCast;
use App\Services\Bitrix\Data\CrmContact\BitrixCrmContactData;
use Modules\My\Data\Chat\BitrixChatChatData;
use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\Attributes\MapInputName;
use Spatie\LaravelData\Attributes\WithCast;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\DataCollection;

class CreateBitrixRequestData extends Data
{
    public function __construct(

        public ?int $request_id,

        public ?string $code,

        #[MapInputName('theme')]
        #[WithCast(AppealTitleCast::class)]
        public ?string $title,

        #[MapInputName('bitrix')]
        public ?BitrixChatChatData $chat,

        #[MapInputName('users')]
        #[WithCast(AppealContactCast::class)]
        public ?BitrixCrmContactData $user,

        #[MapInputName('theme')]
        #[WithCast(AppealPriorityCast::class)]
        public ?string $priority,

        public ?int $unit_id,
        #[MapInputName('lastMessage')]
        public ?RequestMessageData $message,

        #[MapInputName('message.files')]
        #[DataCollectionOf(RequestMessageFileData::class)]
        public ?DataCollection $files,

        public ?string $stage_id = "new",
        public int $opportunity = 0,
    ) {
    }

}



