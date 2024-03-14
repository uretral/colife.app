<?php


namespace Modules\My\Webhooks;


use Illuminate\Support\Facades\Log;
use Modules\My\Data\Webhook\BridgeWebhookData;
use Modules\My\Data\Webhook\NewRequestData;
use Modules\My\Services\MyService;
use Spatie\WebhookClient\Jobs\ProcessWebhookJob;

class BridgeMyWebhookJob extends ProcessWebhookJob
{
    public $queue = 'my_queue';

    public function handle()
    {
        try {

            $payload = BridgeWebhookData::from($this->webhookCall->payload);

            switch ($payload->event){
                case 'NEW_REQUEST':
                    try {
                        $requestDto = NewRequestData::from($payload->data);
                        MyService::createFirstRequest($requestDto);
                    } catch (\Exception $e){
                        Log::channel('webhooks')->error($e->getMessage());
                    }

                    break;
                default:
                    break;


            }
            return true;

        } catch (\Exception $e){
            Log::channel('webhooks')->info($e->getMessage());
        }

    }

}
