<?php


namespace App\Services\Bitrix\Actions\CrmDeals;

use App\Services\Bitrix\Data\CrmFields\BitrixCrmFieldData;

use App\Services\Bitrix\Models\BitrixCrmFields;
use Illuminate\Support\Facades\Log;

class UpdateBitrixDealFieldsAction
{

    /**
     * @throws \Exception
     */
    public function run(BitrixCrmFieldData $dto): BitrixCrmFields
    {
        try {
            return  BitrixCrmFields::updateOrCreate(
                [
                    'bx_name' => $dto->bx_name,
                    'model' => $dto->model,
                ],
                $dto->toArray()
            );

        } catch (\Exception $e) {
            Log::channel('bitrix')->error($e->getMessage());
            throw new \Exception($e->getMessage());
        }
    }


}
