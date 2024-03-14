<?php


namespace App\Services\Bitrix\Actions\CrmDeals;


use App\Services\Bitrix\Actions\AbstractBitrixGetAction;
use App\Services\Bitrix24\Entity\CrmDealEntity;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Log;

/**
 * Class GetBitrixCrmDealFieldsAction
 * @package App\Services\Bitrix\Actions\CrmDeals
 */
class GetBitrixCrmDealFieldsAction extends AbstractBitrixGetAction
{

    /**
     * Получение полей по CRM DEALS
     * @param int $dealId
     * @return Collection
     * @throws \Exception
     */
    public function run(): Collection
    {
        try {
            $api = new CrmDealEntity($this->bitrix);
            return collect($api->fields()['result']);
        } catch (\Exception $e) {
            Log::channel('bitrix')->error($e->getMessage());
            throw new \Exception($e->getMessage());
        }
    }


}
