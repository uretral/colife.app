<?php


namespace App\Services\Bitrix\Actions\UserField;


use App\Services\Bitrix\Actions\AbstractBitrixGetAction;
use App\Services\Bitrix24\Entity\UserFieldConfigEntity;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Log;

/**
 * Class GetBitrixItemListAction
 * @package App\Services\Bitrix\Actions\Crm_Items
 */
class GetBitrixUserFieldListAction extends AbstractBitrixGetAction
{

    /**
     * Получение всех Fields
     * @return Collection
     * @throws \Exception
     */
    public function run(): Collection
    {
        $start = 0;
        //Рекурсивно получаем весь список
        while ($start !== true) {
            $start = $this->getList($start);
        }
        return $this->collection->flatten(1);
    }


    /**
     * @param int $start
     * @return mixed
     * @throws \Exception
     */
    private function getList( $start = 0): mixed
    {
        try {
            $api = new UserFieldConfigEntity($this->bitrix);
            $response = $api->getList(null, null,  $start);

            if (empty($response['result']) || empty($response['result']['fields'])) {
                return true;
            }

            $this->collection->add($response['result']['fields']);

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
