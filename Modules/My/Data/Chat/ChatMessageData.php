<?php

namespace Modules\My\Data\Chat;

use Spatie\LaravelData\Data;

class ChatMessageData extends Data
{
    public function __construct(
        public ?int $id,
        public ?int $chat_id,
        public ?int $user_id,
        public ?string $message,
        public mixed $files,
        public ?int $read,
        public ?string $created_at,
        public ?string $delivered_at,
    ) {
    }
}
