<?php


namespace App\Services\Bitrix\Data\Castables;



use App\Services\Bitrix\Data\CrmStatus\BitrixCrmStatusEntityStatusData;
use App\Services\Bitrix\Models\BitrixCrmStatusEntity;
use App\Services\Bitrix\Models\BitrixCrmStatusEntityStatus;
use Spatie\LaravelData\Casts\Cast;
use Spatie\LaravelData\Support\DataProperty;

class SourceIdCast implements Cast
{
    protected string $entityType = 'SOURCE';

    public function cast(DataProperty $property, mixed $value, array $context): mixed
    {

        if(is_int($value)){
            return BitrixCrmStatusEntityStatusData::from(BitrixCrmStatusEntityStatus::find($value))->status;
        } else {
            return BitrixCrmStatusEntity::where('bx_name',$this->entityType)
                ->first()
                ?->statuses
                ->where('status',$value)
                ->first()->id;
        }

    }
}
