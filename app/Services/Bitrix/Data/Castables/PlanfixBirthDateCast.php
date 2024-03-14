<?php


namespace App\Services\Bitrix\Data\Castables;


use App\Services\Bitrix\Models\BitrixContactUserFieldsValues;
use Illuminate\Support\Carbon;
use Spatie\LaravelData\Casts\Cast;
use Spatie\LaravelData\Support\DataProperty;

class PlanfixBirthDateCast implements Cast
{

    public function cast(DataProperty $property, mixed $value, array $context): null|string
    {

        if (is_array($value) && $value['date'])
            return Carbon::parse($value['date'])->format("Y-m-d H:i:s");
        return null;

    }
}
