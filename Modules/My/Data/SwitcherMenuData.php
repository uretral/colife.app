<?php

namespace Modules\My\Data;

use Spatie\LaravelData\Data;

class SwitcherMenuData extends Data
{
    public function __construct(
        public ?int $id,
        public ?string $title,
        public ?string $link,
        public ?int $cnt,
    )
    {
    }
}
