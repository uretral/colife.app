<?php


namespace App\Services\Bitrix\Actions\Crm_Status;


use App\Services\Bitrix\Data\CrmStatus\BitrixCrmStatusEntityStatusData;
use App\Services\Bitrix\Models\BitrixCrmStatusEntityStatus;
use Illuminate\Support\Facades\Log;
use Spatie\LaravelData\Support\Wrapping\WrapExecutionType;

class UpdateBitrixCrmStatusesEntityStatusAction
{

    /**
     * @throws \Exception
     */
    public function run(BitrixCrmStatusEntityStatusData $dto): BitrixCrmStatusEntityStatus
    {

        try {
            return BitrixCrmStatusEntityStatus::updateOrCreate(
                [
                    'bx_id' => $dto->bx_id,
                    'status'  => $dto->status,
                ],
                $dto->transform(true, WrapExecutionType::Disabled, false)
            );
        } catch (\Exception $e) {
            Log::channel('bitrix')->error($e->getMessage());
            throw new \Exception($e->getMessage());
        }
    }

}
