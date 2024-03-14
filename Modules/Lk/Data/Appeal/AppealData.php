<?php

namespace Modules\Lk\Data\Appeal;

use Modules\Lk\Data\Chat\ChatUserData;
use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\DataCollection;

class AppealData extends Data
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
        public ?AppealMessageData $firstMessage,
        public ?AppealMessageData $lastMessage,
        public ?AppealThemeData $theme,
        public ?AppealThemeTypeData $themeType,
        public ?AppealStatusData $status,
        public ?AppealBitrixData $bitrix,
        public ?bool $hasUnread,
        public ?string $created_at,
    ) {
    }
}



