<?php


namespace App\Services\Bitrix\Actions\EntityModel;

use App\Services\Bitrix\Data\EntityModel\BitrixEntityModelData;
use App\Services\Bitrix\Models\BitrixEntityModel;
use Illuminate\Support\Facades\Log;

class UpdateBitrixEntityModelAction
{

    /**
     * @throws \Exception
     */
    public function run(BitrixEntityModelData $dto): BitrixEntityModel
    {
        try {
            return  BitrixEntityModel::updateOrCreate(
                [
                    'entityId' => $dto->entityId,
                ],
                $dto->toArray()
            );

        } catch (\Exception $e) {
            Log::channel('bitrix')->error($e->getMessage());
            throw new \Exception($e->getMessage());
        }
    }


}
