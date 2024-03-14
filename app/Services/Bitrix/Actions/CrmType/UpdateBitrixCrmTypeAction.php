<?php


namespace App\Services\Bitrix\Actions\CrmType;


use App\Services\Bitrix\Data\CrmType\BitrixCrmTypeData;
use App\Services\Bitrix\Models\BitrixCrmType;
use Illuminate\Support\Facades\Log;

class UpdateBitrixCrmTypeAction
{

    /**
     * @throws \Exception
     */
    public function run(BitrixCrmTypeData $dto): BitrixCrmType
    {
        try {
            return BitrixCrmType::updateOrCreate(
                [
                    'bx_id'             => $dto->bx_id,
                    'bx_entity_type_id' => $dto->bx_entity_type_id,
                ],
                $dto->toArray()
            );
        } catch (\Exception $e) {
            Log::channel('bitrix')->error($e->getMessage());
            throw new \Exception($e->getMessage());
        }
    }

}
