<?php

namespace App\Services\Bitrix\Data\Mappers;


use Spatie\LaravelData\Data;
use Spatie\LaravelData\Support\Wrapping\WrapExecutionType;


class AccountToBitrixDealValuesData extends Data
{
    public function __construct(

        public ?int $deal_id,
        public int $field_id,
        public mixed $value,
    ) {
    }

    public function toCustomArray()
    {
    }


}
