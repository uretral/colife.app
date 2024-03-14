<?php

namespace App\Services\Bitrix\Data\CrmType;

use Spatie\LaravelData\Attributes\MapInputName;
use Spatie\LaravelData\Attributes\MapOutputName;
use Spatie\LaravelData\Attributes\Validation\IntegerType;
use Spatie\LaravelData\Attributes\Validation\Max;
use Spatie\LaravelData\Attributes\Validation\Nullable;
use Spatie\LaravelData\Attributes\Validation\Required;
use Spatie\LaravelData\Attributes\Validation\StringType;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class BitrixCrmTypeData extends Data
{
    public function __construct(
        #[Required, IntegerType]
        #[MapInputName('id')]
        #[MapOutputName('id')]
        public int $bx_id,

        #[Required, StringType, Max(255)]
        #[MapInputName('title')]
        public string $bx_name,

        #[Required, IntegerType]
        #[MapInputName('entityTypeId')]
        public int $bx_entity_type_id,

        #[Nullable, StringType, Max(255)]
        public null|string|Optional $description,

    ) {
    }
}
