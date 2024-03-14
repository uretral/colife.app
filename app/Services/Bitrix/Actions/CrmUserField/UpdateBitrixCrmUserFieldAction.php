<?php


namespace App\Services\Bitrix\Actions\CrmUserField;


use App\Services\Bitrix\Data\CrmUserField\BitrixCrmUserFieldData;
use App\Services\Bitrix\Data\CrmUserField\BitrixCrmUserFieldValueData;
use App\Services\Bitrix\Models\BitrixContactUserFields;
use Illuminate\Support\Facades\Log;
use Spatie\LaravelData\Support\Wrapping\WrapExecutionType;

class UpdateBitrixCrmUserFieldAction
{

    /**
     * @throws \Exception
     */
    public function run(BitrixCrmUserFieldData $dto): BitrixContactUserFields
    {
        try {

            //Записываем основную модель
            $model = BitrixContactUserFields::updateOrCreate(
                [
                    'bx_id' => $dto->bx_id,
                ],
                $dto->transform(true, WrapExecutionType::Disabled, false)
            );

            // Записываем значения полей
            $dto->values->each(
                function (BitrixCrmUserFieldValueData $data) use ($model) {
                    $data->userfield_id = $model->id;
                    $model->values()->updateOrCreate(
                        [
                            'bx_id'      => $data->bx_id,
                            'userfield_id' => $model->id,
                        ],
                        $data->transform(true, WrapExecutionType::Disabled, false)
                    );
                }
            );

            return $model;
        } catch (\Exception $e) {
            Log::channel('bitrix')->error($e->getMessage());
            throw new \Exception($e->getMessage());
        }
    }

}
