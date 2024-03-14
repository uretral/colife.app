<?php


namespace App\Services\Bitrix\Actions\Planfix;


use App\Services\Planfix\Models\Contact;
use Illuminate\Support\Facades\Log;

class UpdatePlanfixContactAction
{

    /**
     * @throws \Exception
     */
    public function run(int $ext_id, int $bx_id): bool|int
    {
        try {
            return Contact::whereExtId($ext_id)->update(
                ['bx_id' => $bx_id,'instance' => config('bitrix24.B24_INSTANCE')]
            );
        } catch (\Exception $e) {
            Log::channel('bitrix')->error($e->getMessage());
            throw new \Exception($e->getMessage());
        }
    }

}
