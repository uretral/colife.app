<?php


namespace App\Services\Bitrix\Actions\CrmContact;


use App\Services\Bitrix\Actions\AbstractBitrixGetAction;
use App\Services\Bitrix\Enum\BitrixContactFieldsEnum;
use App\Services\Bitrix\Models\BitrixCrmContact;
use App\Services\Bitrix24\Entity\ContactEntity;
use Illuminate\Support\Facades\Log;

/**
 * Запись в Битрикс поля: Почта подтверждена = ДА
 * Class StoreBitrixContactRegisteredAction
 * @package App\Services\Bitrix\Actions\CrmContact
 */
class StoreBitrixContactMailConfirmedAction extends AbstractBitrixGetAction
{

    public function run(BitrixCrmContact $model, $value = true)
    {
        try {
            $api = new ContactEntity($this->bitrix);
            $response = $api->update(
                $model->bx_id,
                [
                    BitrixContactFieldsEnum::EMAIL_CONFIRMED()->value => $value,
                ]
            );

            if (empty($response['result'])) {
                throw new \Exception('Ошибка обновления Контакта: ' . $model->bx_id);
            }

            return true;
        } catch (\Exception $e) {
            Log::channel('bitrix')->error($e->getMessage());
            throw new \Exception($e->getMessage());
        }
    }

}
