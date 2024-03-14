<?php

namespace App\Services\Bitrix\Data\Filters;

use Illuminate\Support\Str;
use Spatie\LaravelData\Attributes\MapOutputName;
use Spatie\LaravelData\Data;

class BitrixItemUpdatedFilterData extends Data
{
    public function __construct(
        public ?string $logic,
        #[MapOutputName('>createdTime')]
        public ?\DateTime $created_from,
        #[MapOutputName('<createdTime')]
        public ?string $created_to,
        #[MapOutputName('>updatedTime')]
        public ?string $updated_from,
        #[MapOutputName('<updatedTime')]
        public ?string $updated_to,
        #[MapOutputName('>movedTime')]
        public ?string $moved_from,
        #[MapOutputName('<movedTime')]
        public ?string $moved_to,
    ) {
    }

}
