<?php

namespace Modules\Lk\Data\Bonus;

use Modules\Lk\Data\ContentData;
use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\DataCollection;

class BonusSectionData extends Data
{
    public function __construct(
        public int             $id,
        public ?int            $active,
        public ?int            $order,
        public ?string         $title,
        #[DataCollectionOf(BonusAnnounceData::class)]
        public ?DataCollection $announces,
        #[DataCollectionOf(BonusTextData::class)]
        public ?DataCollection $texts,
        public ?ContentData $content,
        public ?string         $created_at,
        public ?string         $updated_at,
    )
    {
    }
}





