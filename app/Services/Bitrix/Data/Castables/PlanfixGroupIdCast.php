<?php


namespace App\Services\Bitrix\Data\Castables;


use Spatie\LaravelData\Casts\Cast;
use Spatie\LaravelData\Support\DataProperty;

class PlanfixGroupIdCast implements Cast
{

    public function cast(DataProperty $property, mixed $value, array $context): mixed
    {
        return $value['ext_id'] ?? null;
    }

}
