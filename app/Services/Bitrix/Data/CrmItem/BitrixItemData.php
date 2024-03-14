<?php

namespace App\Services\Bitrix\Data\CrmItem;

use App\Services\Bitrix\Models\BitrixCrmItem;
use Spatie\LaravelData\Attributes\MapOutputName;
use Spatie\LaravelData\Attributes\Validation\IntegerType;
use Spatie\LaravelData\Attributes\Validation\Nullable;
use Spatie\LaravelData\Attributes\Validation\Required;
use Spatie\LaravelData\Data;

class BitrixItemData extends Data
{
    public function __construct(
        #[Nullable]
        public null|int $bx_id,

        #[Required, IntegerType]
        public int $bx_entity_type_id,

        #[MapOutputName("fields")]
        public ?array $fields,
    ) {
    }

    public static function fromModel(BitrixCrmItem $model)
    {
        foreach ($model->values->toArray() as $item){
            $fields[$item['bx_name']] = $item['pivot']["value"];
        }
        return new self(
            $model->bx_id,
            $model->bx_entity_type_id,
            $fields

        );
    }
}
