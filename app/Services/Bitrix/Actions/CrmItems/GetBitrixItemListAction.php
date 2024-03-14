<?php


namespace App\Services\Bitrix\Actions\CrmItems;


use App\Services\Bitrix\Actions\AbstractBitrixGetAction;
use App\Services\Bitrix24\Entity\ItemEntity;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Log;

/**
 * Class GetBitrixItemListAction
 * @package App\Services\Bitrix\Actions\Crm_Items
 */
class GetBitrixItemListAction extends AbstractBitrixGetAction
{

    /**
     * Получение всех записей по ID процесса
     * @param int $entityTypeId
     * @return Collection
     * @throws \Exception
     */
    public function run(int $entityTypeId, $filters = []): Collection
    {
        $start = 0;
        //Рекурсивно получаем весь список
        while ($start !== true) {
            $start = $this->getList($entityTypeId, $start,$filters);
        }
        return $this->collection->flatten(1);
    }

    /**
     * @param int $entityTypeId
     * @param int $start
     * @return bool|mixed
     * @throws \Exception
     */
    private function getList(int $entityTypeId, $start = 0, $filters = []): mixed
    {
        try {
            $api = new ItemEntity($this->bitrix);
            $response = $api->getList($entityTypeId, null, $filters, null, $start);

            if (empty($response['result']) || empty($response['result']['items'])) {
                return true;
            }

            $this->collection->add($response['result']['items']);

            if (!empty($response['next'])) {
                return $response['next'];
            } else {
                return true;
            }
        } catch (\Exception $e) {
            Log::channel('bitrix')->error($e->getMessage());
            throw new \Exception($e->getMessage());
        }
    }

}
