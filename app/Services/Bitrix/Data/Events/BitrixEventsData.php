<?php

namespace App\Services\Bitrix\Data\Events;

use App\Services\Bitrix\Data\Chats\BitrixEventChatMessageData;
use App\Services\Bitrix\Data\CrmContact\BitrixCrmContactData;
use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\Attributes\MapInputName;

use Spatie\LaravelData\Attributes\WithCast;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\DataCollection;

class BitrixEventsData extends Data
{
    public function __construct(

        public int $ID,
        public ?string $TIMESTAMP_X,
        public ?string $EVENT_NAME,
        public ?BitrixEventsDataDto $EVENT_DATA,
        public ?array $EVENT_ADDITIONAL,
        public ?string $MESSAGE_ID,

    ) {
    }


}
