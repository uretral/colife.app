<?php


namespace App\Services\Bitrix\Actions\CrmContact;


use App\Services\Bitrix\Actions\AbstractBitrixGetAction;
use App\Services\Bitrix\Helpers\BitrixHelper;
use App\Services\Bitrix24\Entity\ContactEntity;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Log;

class GetBitrixCrmContactFieldsAction extends AbstractBitrixGetAction
{

    /**
     * Получение списка всех ConactFields и их данных (list)
     * @return Collection
     * @throws \Exception
     */
    public function run(): Collection
    {
        try {

            $api = new ContactEntity($this->bitrix);
            $response = $api->fields();

            if (empty($response['result'])) {
                throw new \Exception('Ошибка получения списка полей для Contact');
            }

            return BitrixHelper::r_collect($response['result']);

        } catch (\Exception $e) {
            Log::channel('bitrix')->error($e->getMessage());
            throw new \Exception($e->getMessage());
        }
    }

}
