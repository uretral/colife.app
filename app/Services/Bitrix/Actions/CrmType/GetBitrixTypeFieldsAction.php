<?php


namespace App\Services\Bitrix\Actions\CrmType;


use App\Services\Bitrix24\Entity\ItemEntity;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Log;
use App\Services\Bitrix24\Bitrix;

class GetBitrixTypeFieldsAction
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
    public function run(int $entityTypeId): Collection
    {
        try {
            $api = new ItemEntity($this->bitrix);
            $response = $api->fields($entityTypeId);
            if (empty($response['result']) || empty($response['result']['fields'])) {
                throw new \Exception('Ошибка получения полей смарт-процесса');
            }

            return collect($response['result']['fields']);
        } catch (\Exception $e) {
            Log::channel('bitrix')->error($e->getMessage());
            throw new \Exception($e->getMessage());
        }
    }

}
