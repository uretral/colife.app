<?php

namespace App\Services\Bitrix\Data\CrmUserField;

use App\Services\Bitrix\Actions\Crm_Status\UpdateBitrixCrmStatusesEntityAction;
use App\Services\Bitrix\Models\BitrixCrmStatusEntity;
use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\Attributes\MapInputName;
use Spatie\LaravelData\Attributes\MapOutputName;
use Spatie\LaravelData\Attributes\Validation\IntegerType;
use Spatie\LaravelData\Attributes\Validation\Nullable;
use Spatie\LaravelData\Attributes\Validation\Required;
use Spatie\LaravelData\Attributes\Validation\StringType;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\DataCollection;
use Spatie\LaravelData\Optional;

class BitrixCrmUserFieldData extends Data
{
    public function __construct(

        #[Required, IntegerType]
        #[MapInputName('ID')]
        public int $bx_id,

        #[Required, StringType]
        #[MapInputName('ENTITY_ID')]
        public string $bx_entity_id,

        #[Required, StringType]
        #[MapInputName('FIELD_NAME')]
        public string $bx_name,

        #[Required, StringType]
        #[MapInputName('USER_TYPE_ID')]
        public string $bx_type,

        #[Nullable]
        #[MapInputName('MULTIPLE')]
        public bool|string|Optional $multiple,

        #[Nullable]
        #[MapInputName('LIST')]
        #[DataCollectionOf(BitrixCrmUserFieldValueData::class)]
        public DataCollection $values,

    ) {

        $this->multiple = !($this->multiple == 'N');
    }
}
