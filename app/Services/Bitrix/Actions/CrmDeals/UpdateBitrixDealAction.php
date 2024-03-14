<?php


namespace App\Services\Bitrix\Actions\CrmDeals;


use App\Services\Bitrix\Data\CrmDeal\BitrixDealData;
use App\Services\Bitrix\Models\BitrixCrmDeal;
use Illuminate\Support\Facades\Log;

class UpdateBitrixDealAction
{

    /**
     * @throws \Exception
     */
    public function run(BitrixDealData $dto): BitrixCrmDeal
    {
        try {
            return BitrixCrmDeal::updateOrCreate(
                [
                    'bx_id'       => $dto->bx_id,
                    'category_id' => $dto->category_id,
                ],
                $dto->toArray()
            );
        } catch (\Exception $e) {
            Log::channel('bitrix')->error($e->getMessage());
            throw new \Exception($e->getMessage());
        }
    }

}
