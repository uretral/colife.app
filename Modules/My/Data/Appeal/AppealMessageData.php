<?php

namespace Modules\My\Data\Appeal;

use Spatie\LaravelData\Data;

class AppealMessageData extends Data
{
    public function __construct(
        public ?int $id,
        public ?int $appeal_id,
        public ?int $message_id,
        public ?int $author_id,
        public ?string $message,
        public ?int $bx_chat_id,
        public ?int $bx_message_id,
        public mixed $files,
        public ?int $read,
        public ?string $delivered_at,
        public ?string $created_at,
        public ?string $disable_crm = "Y",
    ) {
    }
}







