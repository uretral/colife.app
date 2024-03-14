<?php

namespace Modules\My\Data\Estate;

use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\DataCollection;

class EstateTenantData extends Data
{
    public function __construct(
        public mixed $id,
        public ?string $name,
        public ?string $avatar,
    )
    {
    }
}
