<?php

namespace App\Services\Bitrix\Data\CrmDeal;

use App\Services\Bitrix\Models\BitrixCrmDeal;
use Spatie\LaravelData\Attributes\MapInputName;
use Spatie\LaravelData\Attributes\MapOutputName;
use Spatie\LaravelData\Attributes\Validation\Nullable;
use Spatie\LaravelData\Data;

class BitrixDealData extends Data
{
    public function __construct(
        #[Nullable]
        #[MapInputName("ID")]
        public null|int $bx_id,

        #[MapInputName("CATEGORY_ID")]
        public ?int $category_id,

        #[MapOutputName("fields")]
        public ?array $fields,
    ) {
    }

    public static function fromModel(BitrixCrmDeal $model): BitrixDealData
    {

        $items = $model->values()->get() ?? [];

        foreach ($items as $item){
            $fields[$item->pivot->field->bx_name] = $item->pivot->value;
        }

        return new self(
            $model->bx_id,
            $model->category_id,
            $fields
        );
    }
}
