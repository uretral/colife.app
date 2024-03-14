<?php


namespace App\Services\Bitrix\Actions\UserField;

use App\Services\Bitrix\Data\UserField\BitrixUserFieldData;
use App\Services\Bitrix\Data\UserField\BitrixUserFieldEnumData;
use App\Services\Bitrix\Models\BitrixUserField;
use Illuminate\Support\Facades\Log;
use Spatie\LaravelData\Optional;

class UpdateBitrixUserFieldAction
{

    /**
     * @throws \Exception
     */
    public function run(BitrixUserFieldData $dto): BitrixUserField
    {
        try {
            $model =  BitrixUserField::updateOrCreate(
                [
                    'bx_id' => $dto->bx_id,
                ],
                $dto->toArray()
            );

            self::saveEnums($model,$dto);

            return $model;

        } catch (\Exception $e) {
            Log::channel('bitrix')->error($e->getMessage());
            throw new \Exception($e->getMessage());
        }
    }

    private function saveEnums(BitrixUserField $model, BitrixUserFieldData $dto)
    {
        if (!$dto->enum instanceof Optional && !empty($dto->enum)) {
            $dto->enum->each(
                function (BitrixUserFieldEnumData $data) use ($model) {
                    $model->values()->updateOrCreate(
                        [
                            'bx_id'      => $data->bx_id,
                        ],
                        $data->toArray()
                    );
                }
            );
        }
    }

}
