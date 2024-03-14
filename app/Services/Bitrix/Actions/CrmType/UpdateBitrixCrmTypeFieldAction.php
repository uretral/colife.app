<?php


namespace App\Services\Bitrix\Actions\CrmType;

use App\Services\Bitrix\Data\CrmType\BitrixCrmTypeFieldData;
use App\Services\Bitrix\Models\BitrixCrmTypeFields;
use Illuminate\Support\Facades\Log;

class UpdateBitrixCrmTypeFieldAction
{

    /**
     * @throws \Exception
     */
    public function run(BitrixCrmTypeFieldData $dto): BitrixCrmTypeFields
    {
        try {
            return BitrixCrmTypeFields::updateOrCreate(
                [
                    'bx_entity_type_id' => $dto->bx_entity_type_id,
                    'bx_name' => $dto->bx_name,
                ],
                $dto->toArray()
            );
        } catch (\Exception $e) {
            Log::channel('bitrix')->error($e->getMessage());
            throw new \Exception($e->getMessage());
        }
    }

}
