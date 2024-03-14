<?php


namespace App\Services\Bitrix\Data\Castables;


use App\Services\Bitrix\Helpers\BitrixHelper;
use Spatie\LaravelData\Casts\Cast;
use Spatie\LaravelData\Support\DataProperty;

class PlanfixTypeIdCast implements Cast
{
    protected $entityType = 'CONTACT_TYPE';

    public function cast(DataProperty $property, mixed $value, array $context): mixed
    {
        $group_id = $value['ext_id'] ?? 1;
        return BitrixHelper::getTypeByGroupId($group_id)->label;
    }

}
