<?php


namespace App\Services\Bitrix\Data\Castables;


use Illuminate\Support\Carbon;
use Spatie\LaravelData\Casts\Cast;
use Spatie\LaravelData\Support\DataProperty;

class DateTimeCast implements Cast
{
    public function cast(DataProperty $property, mixed $value, array $context): mixed
    {
        if (!empty($value))
            return Carbon::parse($value)->format("Y-m-d H:i:s");
        return null;

    }
}
