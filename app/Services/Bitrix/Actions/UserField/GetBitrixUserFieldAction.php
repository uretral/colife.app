<?php


namespace App\Services\Bitrix\Actions\UserField;


use App\Services\Bitrix\Actions\AbstractBitrixGetAction;
use App\Services\Bitrix24\Entity\UserFieldConfigEntity;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Log;

/**
 * Class GetBitrixItemAction
 * @package App\Services\Bitrix\Actions\Crm_Items
 */
class GetBitrixUserFieldAction extends AbstractBitrixGetAction
{

    /**
     * Получение поля по ID
     * @param int $id
     * @return Collection
     * @throws \Exception
     */
    public function run(int $id): Collection
    {
        try {
            $api = new UserFieldConfigEntity($this->bitrix);
            return collect($api->get($id)['result']['field']);
        } catch (\Exception $e) {
            Log::channel('bitrix')->error($e->getMessage());
            throw new \Exception($e->getMessage());
        }
    }


}
