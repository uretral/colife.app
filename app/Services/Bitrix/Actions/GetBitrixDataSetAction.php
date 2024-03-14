<?php


namespace App\Services\Bitrix\Actions;


use App\Services\Bitrix24\Entity\ItemEntity;
use App\Services\Bitrix24\Bitrix;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Log;

class GetBitrixDataSetAction
{
    private Bitrix $bitrix;

    public function __construct(Bitrix $bitrix)
    {
        $this->bitrix = $bitrix;
    }


    /**
     * @param int $entityTypeId
     * @return Collection
     * @throws \Exception
     */
    public function run(int $entityTypeId, $extId): Collection
    {
        try {
            $api = new ItemEntity($this->bitrix);
            $response = $api->get($entityTypeId, $extId);
            if (empty($response['result']) || empty($response['result']['item'])) {
                throw new \Exception('Ошибка получения полей смарт-процесса');
            }

            return collect($response['result']['item']);
        } catch (\Exception $e) {
            Log::channel('bitrix')->error($e->getMessage());
            throw new \Exception($e->getMessage());
        }
    }

}
