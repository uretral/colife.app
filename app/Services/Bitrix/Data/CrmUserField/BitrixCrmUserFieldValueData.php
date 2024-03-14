<?php

namespace App\Services\Bitrix\Data\CrmUserField;

use App\Services\Bitrix\Actions\Crm_Status\UpdateBitrixCrmStatusesEntityAction;
use App\Services\Bitrix\Models\BitrixCrmStatusEntity;
use Spatie\LaravelData\Attributes\MapInputName;
use Spatie\LaravelData\Attributes\MapOutputName;
use Spatie\LaravelData\Attributes\Validation\IntegerType;
use Spatie\LaravelData\Attributes\Validation\Nullable;
use Spatie\LaravelData\Attributes\Validation\Required;
use Spatie\LaravelData\Attributes\Validation\StringType;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class BitrixCrmUserFieldValueData extends Data
{
    public function __construct(

        #[Required, IntegerType]
        #[MapInputName('ID')]
        #[MapOutputName('ID')]
        public int $bx_id,

        #[Required, StringType]
        #[MapInputName('VALUE')]
        #[MapOutputName('VALUE')]
        public string $value,

        #[Required]
        #[MapInputName('SORT')]
        #[MapOutputName('SORT')]
        public int $sort,

        #[Nullable]
        public null|int|Optional $userfield_id,


    ) {
    }
}
