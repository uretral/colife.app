<?php


namespace App\Services\Bitrix\Actions\CrmItems;


use App\Services\Bitrix\Models\BitrixCrmItem;
use Illuminate\Support\Facades\Log;

class UpdateBitrixItemAction
{

    /**
     * @throws \Exception
     */
    public function run($dto): BitrixCrmItem
    {
        try {

            $model = BitrixCrmItem::create(
                $dto->toArray()
            );

            $fieldIds = [];
            foreach ($dto->values as $payload){
                $fieldIds[$payload->crm_type_field_id] = ['value' => $payload->value];
            }
            $model->values()->sync($fieldIds);

            return $model;

        } catch (\Exception $e) {
            Log::channel('bitrix')->error($e->getMessage());
            throw new \Exception($e->getMessage());
        }
    }


}
