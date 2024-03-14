<?php


namespace App\Services\Bitrix\Data\Castables;


use App\Services\Bitrix\Enum\BitrixEntityTypeIdEnum;
use Spatie\LaravelData\Casts\Cast;
use Spatie\LaravelData\Support\DataProperty;

class PlanfixTemplateIdCast implements Cast
{
    const TEMPLATE_IDS_MAP = [
        52 => "APPARTMENTS",
        53 => "UNITS",
    ];

    public function cast(DataProperty $property, mixed $value, array $context): mixed
    {
        try {
            $entity = self::TEMPLATE_IDS_MAP[$value['id']];
            return BitrixEntityTypeIdEnum::$entity()->value;
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
    }

}
