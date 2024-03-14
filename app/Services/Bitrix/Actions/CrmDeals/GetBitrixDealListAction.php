<?php


namespace App\Services\Bitrix\Actions\CrmDeals;


use App\Services\Bitrix\Actions\AbstractBitrixGetAction;
use App\Services\Bitrix24\Entity\CrmDealEntity;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Log;

/**
 * Class GetBitrixDealListAction
 * @package App\Services\Bitrix\Actions\CrmDeals
 */
class GetBitrixDealListAction extends AbstractBitrixGetAction
{

    /**
     * Получение всех записей сделок
     * @param array $filters
     * @return Collection
     * @throws \Exception
     */
    public function run($filters = []): Collection
    {
        $start = 0;
        //Рекурсивно получаем весь список
        while ($start !== true) {
            $start = $this->getList($start,$filters);
        }
        return $this->collection->flatten(1);
    }

    /**
     * @param int $start
     * @param array $filters
     * @return mixed
     * @throws \Exception
     */
    private function getList($start = 0, $filters = []): mixed
    {
        try {
            $api = new CrmDealEntity($this->bitrix);
            $response = $api->getList(null, $filters, null, $start);

            if (empty($response['result'])) {
                return true;
            }

            $this->collection->add($response['result']);

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
