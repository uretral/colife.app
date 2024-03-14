<?php

namespace App\Services\Bitrix\Data\CrmStatus;

use Spatie\LaravelData\Attributes\MapInputName;
use Spatie\LaravelData\Attributes\MapOutputName;
use Spatie\LaravelData\Attributes\Validation\IntegerType;
use Spatie\LaravelData\Attributes\Validation\Nullable;
use Spatie\LaravelData\Attributes\Validation\Required;
use Spatie\LaravelData\Attributes\Validation\StringType;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class BitrixCrmStatusEntityStatusData extends Data
{
    public function __construct(
        #[Required, IntegerType]
        #[MapInputName('ID')]
        #[MapOutputName('ID')]
        public int $bx_id,

        #[Nullable]
        #[MapOutputName('INT_ID')]
        public int|Optional $crm_status_entity_id,

        #[Required, StringType]
        #[MapInputName('STATUS_ID')]
        #[MapOutputName('STATUS_ID')]
        public string $status,

        #[Nullable, StringType]
        #[MapInputName('NAME')]
        #[MapOutputName('NAME')]
        public string|Optional $name,

        #[Nullable, StringType]
        #[MapInputName('NAME_INIT')]
        #[MapOutputName('NAME_INIT')]
        public string|Optional $name_init,
    ) {}
}


