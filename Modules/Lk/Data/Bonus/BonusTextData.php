<?php

namespace Modules\Lk\Data\Bonus;

use Modules\Lk\Data\ContentData;
use Spatie\LaravelData\Data;

class BonusTextData extends Data
{
    public function __construct(
        public int $id,
        public ?int $active,
        public ?int $order,
        public ?int $bonus_section_id,
        public ?string $title,
        public ?ContentData $content,
        public ?string $text,
        public ?string $created_at,
        public ?string $updated_at,
    ) {}
}
