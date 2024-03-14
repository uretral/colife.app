<?php


namespace App\Services\Bitrix\Actions\CrmDeals;


use App\Services\Bitrix\Actions\AbstractBitrixGetAction;
use App\Services\Bitrix24\Entity\CrmDealEntity;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Log;

/**
 * Class GetBitrixCrmDealAction
 * @package App\Services\Bitrix\Actions\CrmDeals
 */
class GetBitrixCrmDealAction extends AbstractBitrixGetAction
{

    /**
     * Получение записи по ID сделки
     * @param int $dealId
     * @return Collection
     * @throws \Exception
     */
    public function run(int $dealId): Collection
    {
        try {
            $api = new CrmDealEntity($this->bitrix);
            $response = $api->get(dealId: $dealId);
            return collect($response['result']);
        } catch (\Exception $e) {
            Log::channel('bitrix')->error($e->getMessage());
            throw new \Exception($e->getMessage());
        }
    }


}
