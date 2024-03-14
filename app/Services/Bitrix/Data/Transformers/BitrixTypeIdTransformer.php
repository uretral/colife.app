<?php


namespace App\Services\Bitrix\Data\Transformers;


use App\Services\Bitrix\Models\BitrixCrmStatusEntity;
use App\Services\Bitrix\Models\BitrixCrmStatusEntityStatus;
use Spatie\LaravelData\Support\DataProperty;
use Spatie\LaravelData\Transformers\Transformer;

class BitrixTypeIdTransformer implements Transformer
{

    public function transform(DataProperty $property, mixed $value, $entityName = 'CONTACT_TYPE'): int
    {

        $entityId = BitrixCrmStatusEntity::where('bx_name',$entityName)->firstOrFail()->id;
        $status_id = BitrixCrmStatusEntityStatus::where('crm_status_entity_id', $entityId)->where('status',$value)->first()->id ?? null;
        return $status_id;
    }
}
