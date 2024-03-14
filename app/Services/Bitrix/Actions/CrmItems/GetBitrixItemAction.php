<?php


namespace App\Services\Bitrix\Actions\CrmItems;


use App\Services\Bitrix\Actions\AbstractBitrixGetAction;
use App\Services\Bitrix24\Entity\ItemEntity;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Log;

/**
 * Class GetBitrixItemAction
 * @package App\Services\Bitrix\Actions\Crm_Items
 */
class GetBitrixItemAction extends AbstractBitrixGetAction
{

    /**
     * Получение записи по ID процесса
     * @param int $entityTypeId
     * @return Collection
     * @throws \Exception
     */
    public function run(int $entityTypeId, int $item_id): Collection
    {
        try {
            $api = new ItemEntity($this->bitrix);
            return collect($api->get($entityTypeId, $item_id));
        } catch (\Exception $e) {
            Log::channel('bitrix')->error($e->getMessage());
            throw new \Exception($e->getMessage());
        }
    }


}
