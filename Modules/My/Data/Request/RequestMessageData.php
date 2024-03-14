<?php

namespace Modules\My\Data\Request;

use Spatie\LaravelData\Data;

class RequestMessageData extends Data
{
    public function __construct(
        public ?int $id,
        public ?int $request_id,
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







