<?php


namespace App\Services\Bitrix\Actions\Schedule;


use App\Services\Bitrix\Actions\AbstractBitrixGetAction;
use App\Services\Bitrix\Actions\CrmItems\GetBitrixItemListAction;
use App\Services\Bitrix\BitrixService;
use App\Services\Bitrix\Data\Filters\BitrixItemUpdatedFilterData;
use App\Services\Bitrix\Models\BitrixCrmType;
use Illuminate\Support\Facades\Log;

/**
 * Class SyncBitrixUpdatedItemAction
 * @package App\Services\Bitrix\Actions\Crm_Items
 */
class SyncBitrixUpdatedItemAction extends AbstractBitrixGetAction
{

    /**
     * Обновляем измененные смартпроцессы за период (дни)
     * @param int $days
     * @return array
     * @throws \Exception
     */
    public function run(int $days = 1): bool
    {
        try {

            $filter = BitrixItemUpdatedFilterData::from([
                'updated_from' => now()->subDays($days)->toAtomString(),
                'updated_to' => now()->toAtomString(),
            ]);

            BitrixCrmType::get()->each(function (BitrixCrmType $entity) use ($filter){
                $dataList = app(GetBitrixItemListAction::class)->run($entity->bx_entity_type_id,$filter->toArray());
                Log::channel('bitrix')->info("Обновляем смарт процесс {$entity->bx_name}: {$dataList->count()} элементов");
                $dataList->each(
                    function (array $item) use ($entity) {
                        BitrixService::updateItemWithValues($entity->bx_entity_type_id, $item['id'], $item);
                    }
                );
            });

            return true;

        } catch (\Exception $e) {
            Log::channel('bitrix')->error($e->getMessage());
            throw new \Exception($e->getMessage());
        }
    }


}
