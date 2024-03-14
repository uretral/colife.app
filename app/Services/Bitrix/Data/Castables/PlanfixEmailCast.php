<?php


namespace App\Services\Bitrix\Data\Castables;


use Illuminate\Support\Str;
use Spatie\LaravelData\Casts\Cast;
use Spatie\LaravelData\Support\DataProperty;

class PlanfixEmailCast implements Cast
{

    public function cast(DataProperty $property, mixed $value, array $context): null|array
    {
        if (!empty($value)) {

            $string = Str::of($value)
                ->whenContains(' ', function ($string) {
                    return Str::of(explode(" ", $string)[0]);
                })->value();
            return [
                "VALUE"      => $string,
                "VALUE_TYPE" => "WORK"
            ];

        }
        return null;
    }
}
