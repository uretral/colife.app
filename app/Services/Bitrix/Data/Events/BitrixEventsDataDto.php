<?php

namespace App\Services\Bitrix\Data\Events;

use App\Services\Bitrix\Data\Chats\BitrixEventChatMessageData;
use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\DataCollection;

class BitrixEventsDataDto extends Data
{
    public function __construct(

        public ?string $CONNECTOR,
        public ?int $LINE,
        #[DataCollectionOf(BitrixEventChatMessageData::class)]
        public ?DataCollection $MESSAGES,

    ) {
    }


}
