<?php

namespace Modules\Lk\Data\Article;

use Livewire\Wireable;
use Modules\Lk\Data\ContentData;
use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\Concerns\WireableData;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\DataCollection;

class ArticleData extends Data implements Wireable
{
    use WireableData;

    public function __construct(
        public ?int            $id,
        public ?int            $active,
        public ?int            $order,
        public ?string         $title,
        public ?string         $image,
        public ?ContentData    $content,
        #[DataCollectionOf(ArticleReactionUserData::class)]
        public ?DataCollection $reactions,
        public ?string         $created_at,
        public ?string         $updated_at,
    )
    {
    }
}







