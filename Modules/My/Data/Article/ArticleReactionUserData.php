<?php

namespace Modules\My\Data\Article;

use Spatie\LaravelData\Data;

class ArticleReactionUserData extends Data
{
    public function __construct(
        public ?int    $id,
        public ?int    $user_id,
        public ?int    $reaction_id,
        public ?int    $article_id,
        public ?string $created_at,
        public ?string $updated_at,
    )
    {
    }
}
