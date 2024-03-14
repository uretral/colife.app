<?php


namespace App\Services\Bitrix\Data\Castables;



use App\Services\Bitrix\Data\CrmStatus\BitrixCrmStatusEntityStatusData;
use App\Services\Bitrix\Helpers\BitrixHelper;
use App\Services\Bitrix\Models\BitrixCrmStatusEntity;
use App\Services\Bitrix\Models\BitrixCrmStatusEntityStatus;
use Spatie\LaravelData\Casts\Cast;
use Spatie\LaravelData\Support\DataProperty;

class EntityModelCast implements Cast
{


    public function cast(DataProperty $property, mixed $value, array $context): mixed
    {
        return BitrixHelper::getModelByEntity($value);
    }
}
