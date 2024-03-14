<?php


namespace App\Services\Bitrix\Actions\CrmItems;


use App\Services\Bitrix\Actions\AbstractBitrixGetAction;
use App\Services\Bitrix\Data\CrmItem\BitrixItemData;
use App\Services\Bitrix24\Entity\ItemEntity;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Log;

/**
 * Class AddBitrixItemAction
 * @package App\Services\Bitrix\Actions\Crm_Items
 */
class AddBitrixItemAction extends AbstractBitrixGetAction
{

    /**
     * Добавление новой записи по Смарт-процессу
     * @param BitrixItemData $dto
     * @return int
     * @throws \Exception
     */
    public function run(BitrixItemData $dto): int
    {
        try {
            $data = $dto->toArray();
            $api = new ItemEntity($this->bitrix);
            $response = $api->add($data["bx_entity_type_id"],$data["fields"]);
            if (!empty($response['result']) && !empty($response['result']['item']['id'])) {
                return $response['result']['item']['id'];
            }
            throw new \Exception("Ошибка добавления Новой записи по Смарт-процессу");

        } catch (\Exception $e) {
            Log::channel('bitrix')->error($e->getMessage());
            throw new \Exception($e->getMessage());
        }
    }


}
