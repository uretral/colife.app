<?php


namespace App\Services\Bitrix\Actions\Crm_Status;


use App\Services\Bitrix\Data\BitrixCrmTypeFieldData;
use App\Services\Bitrix\Data\CrmStatus\BitrixCrmStatusEntityData;
use App\Services\Bitrix\Models\BitrixCrmStatusEntity;
use App\Services\Bitrix\Models\BitrixFields;
use Illuminate\Support\Facades\Log;

class UpdateBitrixCrmStatusesEntityAction
{

    /**
     * @throws \Exception
     */
    public function run(BitrixCrmStatusEntityData $dto): BitrixCrmStatusEntity
    {
        try {
            return BitrixCrmStatusEntity::updateOrCreate(
                [
                    'bx_id' => $dto->bx_id,
                    'bx_name'  => $dto->bx_name,
                ],
                $dto->toArray()
            );
        } catch (\Exception $e) {
            Log::channel('bitrix')->error($e->getMessage());
            throw new \Exception($e->getMessage());
        }
    }

}
