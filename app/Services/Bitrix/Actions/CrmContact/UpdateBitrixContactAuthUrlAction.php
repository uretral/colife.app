<?php


namespace App\Services\Bitrix\Actions\CrmContact;


use App\Services\Bitrix\Helpers\BitrixHelper;
use App\Services\Bitrix\Models\BitrixCrmContact;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Log;

class UpdateBitrixContactAuthUrlAction
{

    /**
     * @throws \Exception
     */
    public function run($bxId, $update = false): string|bool
    {
        try {

            $model = BitrixCrmContact::has('email')
                ->whereBxId($bxId)
                ->firstOrFail();

            if (empty($model->auth_url) || $update) {
                $hash = BitrixHelper::encodedAuthUrl($model->email()->first()->value, $bxId, $model->fullName);
                $model->auth_url = config('bitrix24.ACCOUNT_URL') . $hash;
                $model->save();
            }

            return $model->auth_url;
        } catch (ModelNotFoundException $e) {
            Log::channel('bitrix')->info("Нет почты для crm_contacts.bx_id: " . $bxId);
            return false;
        } catch (\Exception $e) {
            Log::channel('bitrix')->error($e->getMessage());
            throw new \Exception($e->getMessage());
        }
    }




}
