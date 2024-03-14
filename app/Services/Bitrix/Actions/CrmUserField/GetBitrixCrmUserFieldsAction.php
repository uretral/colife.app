<?php


namespace App\Services\Bitrix\Actions\CrmUserField;


use App\Services\Bitrix\Actions\AbstractBitrixGetAction;
use App\Services\Bitrix\Helpers\BitrixHelper;
use App\Services\Bitrix24\Entity\ContactEntity;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Log;

class GetBitrixCrmUserFieldsAction extends AbstractBitrixGetAction
{

    /**
     * Получение списка всех ConactUserfields и их данных (list)
     * @param string $entity
     * @return Collection
     * @throws \Exception
     */
    public function run(string $type_id = 'enumeration'): Collection
    {
        try {

            $filter = !empty($type_id) ? ['USER_TYPE_ID' => $type_id ] : [];

            $api = new ContactEntity($this->bitrix);
            $response = $api->getUserFieldsList([],$filter);

            if (empty($response['result'])) {
                throw new \Exception('Ошибка получения списка дополнительных сущностей');
            }

            return BitrixHelper::r_collect($response['result']);

        } catch (\Exception $e) {
            Log::channel('bitrix')->error($e->getMessage());
            throw new \Exception($e->getMessage());
        }
    }

}
