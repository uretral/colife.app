<?php

namespace Modules\Lk\Data\Chat;

use Livewire\Wireable;
use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\Attributes\MapInputName;
use Spatie\LaravelData\Concerns\WireableData;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\DataCollection;

class ChatData extends Data implements Wireable
{
    use WireableData;

    public function __construct(
        public ?int             $id,
        public ?bool            $active,
        public ?string          $title,
        public ?string          $icon,
        public ?int             $is_group,
        #[MapInputName('last')]
        public ?ChatMessageData $lastMessage,
        #[DataCollectionOf(ChatMessageData::class)]
        public ?DataCollection  $messages,
        #[DataCollectionOf(ChatUserData::class)]
        public ?DataCollection  $users,
        public ?bool            $hasUnread,
        public ?string          $updated_at,
    )
    {
    }
}
