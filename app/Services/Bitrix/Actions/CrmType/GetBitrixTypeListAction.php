<?php


namespace App\Services\Bitrix\Actions\CrmType;


use App\Services\Bitrix24\Entity\TypeEntity;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Log;
use App\Services\Bitrix24\Bitrix;

class GetBitrixTypeListAction
{
    private Bitrix $bitrix;

    public function __construct(Bitrix $bitrix)
    {
        $this->bitrix = $bitrix;
    }

    /**
     * @throws \Exception
     */
    public function run(): Collection
    {
        try {
            $api = new TypeEntity($this->bitrix);
            $response = $api->getList();
            if (empty($response['result']) || empty($response['result']['types'])) {
                throw new \Exception('Ошибка получения списка смарт-процессов');
            }

            return collect($response['result']['types']);
        } catch (\Exception $e) {
            Log::channel('bitrix')->error($e->getMessage());
            throw new \Exception($e->getMessage());
        }
    }

}
