<?php

namespace App\Services\Bitrix\Jobs;

use App\Services\Bitrix\Actions\CrmContact\UpdateBitrixContactAction;
use App\Services\Bitrix\Actions\Planfix\UpdatePlanfixContactAction;
use App\Services\Bitrix\BitrixService;
use App\Services\Bitrix\Data\CrmContact\BitrixCrmContactData;
use App\Services\Bitrix\Data\Mappers\PlanfixToBitrixContactData;
use App\Services\Planfix\Data\ContactData;
use App\Services\Planfix\Models\Contact;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

/**
 * ПланфиксКонтакт -> LocalBitrix -> B24
 * Class ProcessPushPlanfixContacts
 * @package App\Services\Bitrix\Jobs
 */
class ProcessPushPlanfixContacts implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected Contact                   $contact;
    protected UpdateBitrixContactAction $action;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Contact $contact)
    {
        $this->contact = $contact;
        $this->action = new UpdateBitrixContactAction();
    }

    /**
     * Execute the job.
     *
     * @throws \Exception
     */
    public function handle()
    {
        try {

            $pxDto = ContactData::from($this->contact)->toArray();
            $bxDto = PlanfixToBitrixContactData::from($pxDto)->toCustomArray();
            $modelDto = BitrixCrmContactData::from($bxDto);

            $bxModel = $this->action->run($modelDto);

            $bx_id = BitrixService::storeBitrixContactFromModelId($bxModel);
            Log::channel('bitrix')->info("Добавлен контакт: " . $bx_id);

            return (new UpdatePlanfixContactAction())->run($this->contact->ext_id, $bx_id);
        } catch (\Exception $e) {
            Log::channel('bitrix')->error($e->getMessage());

            return false;
        }
    }
}
