<?php


namespace App\Services\Bitrix\Data\Castables;


use App\Services\Bitrix\Models\BitrixContactUserFieldsValues;
use Spatie\LaravelData\Casts\Cast;
use Spatie\LaravelData\Support\DataProperty;

class PlanfixGenderIdCast implements Cast
{

    public function cast(DataProperty $property, mixed $value, array $context): null|string
    {
        return BitrixContactUserFieldsValues::whereExtId($value)->first()->bx_id;
    }
}
