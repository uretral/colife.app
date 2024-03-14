<?php

namespace Modules\Lk\Data\Bonus;

use Modules\Lk\Data\ContentData;
use Spatie\LaravelData\Data;

class BonusAnnounceData extends Data
{
    public function __construct(
        public int $id,
        public ?int $active,
        public ?int $order,
        public ?int $bonus_section_id,
        public ?ContentData $content,
        public ?string $title,
        public ?string $text,
        public ?string $created_at,
        public ?string $updated_at,
    ) {}
}
