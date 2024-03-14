<?php

namespace Modules\Lk\Data\Chat;

use Spatie\LaravelData\Data;

class ChatMenuData extends Data
{
    public function __construct(
        public int $id,
        public ?string $title,
        public ?string $link,
        public ?int $cnt,
    ) {}
}
