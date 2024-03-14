<?php

namespace Modules\My\Data\Request;

use Modules\My\Data\Appeal\AppealStatusData;
use Modules\My\Data\Chat\ChatUserData;
use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\DataCollection;

class RequestData extends Data
{
    public function __construct(
        public ?int $id,
        public ?int $theme_id,
        public ?int $type_id,
        public ?int $status_id,
        public ?int $active,
        public ?int $score,
        #[DataCollectionOf(ChatUserData::class)]
        public ?DataCollection $users,
        public ?RequestMessageData $lastMessage,
        public ?RequestThemeData $theme,
        public ?AppealStatusData $status,

        public ?RequestBitrixData $bitrix,

        public ?bool $hasUnread,
        public ?string $created_at,
    ) {
    }
}



