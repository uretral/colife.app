<?php


namespace App\Services\Bitrix\Actions\CrmContact;


use App\Services\Bitrix\Actions\AbstractBitrixGetAction;
use Bitrix24\CRM\Contact;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Log;

class GetBitrixCrmContactAction extends AbstractBitrixGetAction
{

    /**
     * Получение контакта
     * @param integer $contactId
     * @return Collection
     * @throws \Exception
     */
    public function run(int $contactId): Collection
    {
        try {

            $api = new Contact($this->bitrix);
            $response = $api->get($contactId);

            if (empty($response['result'])) {
                throw new \Exception('Ошибка получения CRM.Contact ID:' . $contactId);
            }

            return collect($response['result']);

        } catch (\Exception $e) {
            Log::channel('bitrix')->error($e->getMessage());
            throw new \Exception($e->getMessage());
        }
    }

}

