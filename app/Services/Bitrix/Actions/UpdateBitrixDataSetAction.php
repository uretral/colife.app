<?php


namespace App\Services\Bitrix\Actions;


use App\Services\Bitrix\Data\BitrixDataSetData;
use App\Services\Bitrix\Data\CrmItem\BitrixItemData;
use App\Services\Bitrix\Models\BitrixCrmItem;
use App\Services\Bitrix\Models\BitrixDataSet;
use Illuminate\Support\Facades\Log;

class UpdateBitrixDataSetAction
{

    /**
     * @throws \Exception
     */
    public function run(BitrixItemData $dto): BitrixCrmItem
    {
        try {
            return BitrixCrmItem::updateOrCreate(
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
