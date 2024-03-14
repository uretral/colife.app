<?php


namespace App\Services\Bitrix\Actions\CrmContact;


use App\Services\Bitrix\Models\BitrixCrmContact;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Log;

class SaveBitrixContactIsRegisteredAction
{

    /**
     * @throws \Exception
     */
    public function run(int $contactId): BitrixCrmContact
    {
        try {
            $model = BitrixCrmContact::whereBxId($contactId)->firstOrFail();
            $model->email_confirmed = true;
            $model->save();
            return $model;

        } catch (ModelNotFoundException $e) {
            Log::channel('bitrix')->info("Нет Контакта с bx_id: " . $contactId);
            throw new \Exception($e->getMessage());
        } catch (\Exception $e) {
            Log::channel('bitrix')->error($e->getMessage());
            throw new \Exception($e->getMessage());
        }
    }




}
