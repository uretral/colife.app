<?php

namespace Modules\Lk\Data\Article;

use Livewire\Wireable;
use Spatie\LaravelData\Concerns\WireableData;
use Spatie\LaravelData\Data;

class ArticleReactionData extends Data implements Wireable
{
    use WireableData;

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






