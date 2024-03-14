<?php

namespace Modules\My\Data\Chat;

use Modules\My\Data\Casts\ChatLastMessageCast;
use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\Attributes\MapInputName;
use Spatie\LaravelData\Attributes\WithCast;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\DataCollection;

class ChatData extends Data
{
    public function __construct(
      public ?int $id,
      public ?string $title,
      public ?string $icon,
      public ?int $is_group,
      #[MapInputName('last')]
      public ?ChatMessageData $lastMessage,
      #[DataCollectionOf(ChatUserData::class)]
      public ?DataCollection $users,
      public ?bool   $hasUnread,
      public ?string $updated_at,
    ) {}
}
