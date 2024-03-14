<?php

namespace Modules\My\Data\Article;

use Spatie\LaravelData\Data;

class ArticleReactionData extends Data
{
    public function __construct(
        public int     $id,
        public ?int    $active,
        public ?int    $order,
        public ?string $title,
        public ?string $icon,
        public ?string $created_at,
        public ?string $updated_at,
    )
    {
    }
}






