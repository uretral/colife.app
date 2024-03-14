<?php


namespace App\Services\Bitrix\Actions\CrmContact;


use App\Services\Bitrix\Actions\AbstractBitrixGetAction;
use App\Services\Bitrix\Enum\BitrixContactFieldsEnum;
use App\Services\Bitrix\Models\BitrixCrmContact;
use App\Services\Bitrix24\Entity\ContactEntity;
use Illuminate\Support\Facades\Log;

/**
 * Запись в Битрикс поля: сгенерированная ссылка на регистрацию | $contactId = bx_id
 * Class StoreBitrixContactRegisteredAction
 * @package App\Services\Bitrix\Actions\CrmContact
 */
class StoreBitrixContactAuthUrlAction extends AbstractBitrixGetAction
{

    // в Битрикс ID $contactId = crm_contacts.bx_id в Мосте
    public function run(int $contactId, $auth_url)
    {
        try {
            $api = new ContactEntity($this->bitrix);
            $response = $api->update(
                $contactId,
                [
                    // Значение поля Битрикс
                    BitrixContactFieldsEnum::AUTH_URL()->value => $auth_url,
                ]
            );

            if (empty($response['result'])) {
                throw new \Exception('Ошибка обновления Контакта: ' . $contactId);
            }

            return $response['result'];
        } catch (\Exception $e) {
            Log::channel('bitrix')->error($e->getMessage());
            throw new \Exception($e->getMessage());
        }
    }

}
