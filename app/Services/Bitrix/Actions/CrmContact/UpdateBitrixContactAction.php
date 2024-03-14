<?php


namespace App\Services\Bitrix\Actions\CrmContact;


use App\Services\Bitrix\Data\CrmContact\BitrixCrmContactData;
use App\Services\Bitrix\Models\BitrixCrmContact;
use Illuminate\Support\Facades\Log;
use Spatie\LaravelData\Optional;
use Spatie\LaravelData\Support\Wrapping\WrapExecutionType;

use function PHPUnit\Framework\isInstanceOf;

class UpdateBitrixContactAction
{

    /**
     * @throws \Exception
     */
    public function run(BitrixCrmContactData $dto): BitrixCrmContact
    {
        try {

            $model = BitrixCrmContact::updateOrCreate(
                ['bx_id' => self::bxId($dto) ?? null],
                $dto->transform(true, WrapExecutionType::Disabled, false)
            );

            // Записываем Телефоны
            $this->savePhones($model, $dto);
            $this->saveEmails($model, $dto);


            return $model;
        } catch (\Exception $e) {
            Log::channel('bitrix')->error($e->getMessage());
            throw new \Exception($e->getMessage());
        }
    }

    private function bxId($dto)
    {
        return $dto->bx_id instanceof Optional
            ? null
            : $dto->bx_id;
    }

    private function savePhones(BitrixCrmContact $model, BitrixCrmContactData $dto)
    {
        if (!$dto->phone instanceof Optional) {
            $dto->phone->each(
                function ($data) use ($model) {
                    $data->contact_id = $model->id;
                    $model->phone()->updateOrCreate(
                        [
                            'bx_id'      => self::bxId($data),
                            'contact_id' => $model->id,
                        ],
                        $data->transform(true, WrapExecutionType::Disabled, false)
                    );
                }
            );
        }
    }

    private function saveEmails(BitrixCrmContact $model, BitrixCrmContactData $dto)
    {
        if (!$dto->email instanceof Optional) {
            $dto->email->each(
                function ($data) use ($model) {
                    $data->contact_id = $model->id;
                    $model->email()->updateOrCreate(
                        [
                            'bx_id'      => self::bxId($data),
                            'contact_id' => $model->id,
                        ],
                        $data->transform(true, WrapExecutionType::Disabled, false)
                    );
                }
            );
        }
    }

}
