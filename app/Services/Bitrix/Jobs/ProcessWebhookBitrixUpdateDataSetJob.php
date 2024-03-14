<?php


namespace App\Services\Bitrix\Jobs;


use App\Services\Bitrix\BitrixService;
use App\Services\Bitrix\Helpers\BitrixHelper;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Log;
use QCod\Settings\Setting\SettingEloquentStorage;
use Spatie\WebhookClient\Jobs\ProcessWebhookJob;
use Spatie\WebhookClient\Models\WebhookCall;

class ProcessWebhookBitrixUpdateDataSetJob extends ProcessWebhookJob
{

    public function handle()
    {
        try {

            app(SettingEloquentStorage::class)->flushCache();
            $payload = json_decode(json_encode($this->webhookCall->payload));

            if (empty($payload) || empty($payload->event)) {
                return false;
            }

            return match (BitrixHelper::getWebhookAction($payload->event)) {
                'CONTACT' => $this->updateContact($payload,$payload->event),
                "ITEM" => $this->updateItem($payload),
                default => true,
            };

        } catch (\Exception $e){
            Log::channel('webhooks')->info($e->getMessage());
        }

    }

    protected function updateItem($payload)
    {
        try {
            Log::channel('webhooks')->info('WEBHOOK СМАРТ-ПРОЦЕССА"' . json_encode($payload->data->FIELDS));
//             BitrixService::getUpdateDataSet($dto->entity_type_id, $entity->id, $dto->id);
            return true;
        } catch (\Exception $e) {
            Log::channel('webhooks')->error($e->getMessage());
            return false;
        }
    }

    protected function updateContact($payload, $event): bool
    {
        try {
            $id = $payload->data?->FIELDS?->ID ?? null;
            if (!empty($id) && !empty($event)) {
                switch ($event) {
                    case 'ONCRMCONTACTDELETE':
                        Log::channel('webhooks')->info('УДАЛЕНИЕ КОНТАКТА: "' . $id);
                        break;
                    default :
                        Log::channel('webhooks')->info('ОБНОВЛЕНИЕ КОНТАКТА: "' . $id);
                        BitrixService::syncContact($id);
                        break;
                }
            }
            return true;
        } catch (\Exception $e) {
            Log::channel('webhooks')->error($e->getMessage());
            return false;
        }
    }
}
