<?php


namespace App\Services\Bitrix\Actions\CrmMultifield;


use App\Services\Bitrix\Helpers\BitrixHelper;
use App\Services\Bitrix\Actions\AbstractBitrixGetAction;
use Bitrix24\CRM\Status;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Log;

class GetBitrixCrmMultifieldListAction extends AbstractBitrixGetAction
{

    /**
     * Получение списка всех сущностей и их статусов
     * @param string $entity
     * @return Collection
     * @throws \Exception
     */
    public function run(string $entity = ''): Collection
    {
        try {

            $filter = !empty($entity) ? ['ENTITY_ID' => $entity ] : [];

            $api = new Status($this->bitrix);
            $response = $api->getList([],$filter);

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
