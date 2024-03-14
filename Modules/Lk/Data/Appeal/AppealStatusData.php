<?php

namespace Modules\Lk\Data\Appeal;

use Modules\Lk\Data\ContentData;
use Spatie\LaravelData\Data;

class AppealStatusData extends Data
{
    public function __construct(
        public ?int    $id,
        public ?string $title,
        public ?string $color,
        public ?string $bg,
        public ?ContentData $content,
    )
    {
    }
}

