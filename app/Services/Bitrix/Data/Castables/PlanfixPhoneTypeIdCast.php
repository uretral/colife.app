<?php


namespace App\Services\Bitrix\Data\Castables;


use App\Services\Planfix\Models\PhoneType;
use Illuminate\Support\Str;
use Spatie\LaravelData\Casts\Cast;
use Spatie\LaravelData\Support\DataProperty;

class PlanfixPhoneTypeIdCast implements Cast
{

    public function cast(DataProperty $property, mixed $value, array $context): mixed
    {

        return Str::upper(PhoneType::find($value)->name);

    }
}
