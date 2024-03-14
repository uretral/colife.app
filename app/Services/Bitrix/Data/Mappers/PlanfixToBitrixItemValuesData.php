<?php

namespace App\Services\Bitrix\Data\Mappers;


use Spatie\LaravelData\Data;
use Spatie\LaravelData\Support\Wrapping\WrapExecutionType;


class PlanfixToBitrixItemValuesData extends Data
{
    public function __construct(

        public ?int $crm_item_id,
        public int $crm_type_field_id,
        public mixed $value,
    ) {
    }

    public function toCustomArray()
    {

    }


}
