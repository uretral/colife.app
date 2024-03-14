<?php

namespace App\Services\Bitrix\Data;

use Spatie\LaravelData\Attributes\MapInputName;
use Spatie\LaravelData\Attributes\Validation\IntegerType;
use Spatie\LaravelData\Attributes\Validation\Required;
use Spatie\LaravelData\Data;

class OnCrmDynamicUpdatedData extends Data
{
    public function __construct(
        #[Required, IntegerType]
        #[MapInputName('ID')]
        public int $id,

        #[Required, IntegerType]
        #[MapInputName('ENTITY_TYPE_ID')]
        public int $entity_type_id,
    ) {
    }
}
