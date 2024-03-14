<?php

namespace Modules\My\Data;

use Spatie\LaravelData\Data;

class ContentData extends Data
{
    public function __construct(
        public ?int    $id,
        public ?int    $parent_id,
        public ?string $locale,
        public ?string $model,
        public ?string $title,
        public ?string $intro,
        public ?string $text,
        public ?string $file,
        public ?string $created_at,
        public ?string $updated_at,
    )
    {
    }
}
