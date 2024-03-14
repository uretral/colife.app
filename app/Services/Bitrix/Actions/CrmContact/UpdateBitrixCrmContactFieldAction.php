<?php


namespace App\Services\Bitrix\Actions\CrmContact;

use App\Services\Bitrix\Data\CrmContact\BitrixCrmContactFieldData;
use App\Services\Bitrix\Models\BitrixCrmContactFields;
use Illuminate\Support\Facades\Log;

class UpdateBitrixCrmContactFieldAction
{

    /**
     * @throws \Exception
     */
    public function run(BitrixCrmContactFieldData $dto): BitrixCrmContactFields
    {
        try {
            return  BitrixCrmContactFields::updateOrCreate(
                ['bx_name' => $dto->bx_name],
                $dto->toArray()
            );
        } catch (\Exception $e) {
            Log::channel('bitrix')->error($e->getMessage());
            throw new \Exception($e->getMessage());
        }
    }

}
