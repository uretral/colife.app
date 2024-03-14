<?php

namespace Modules\My\Listeners;

use Modules\CrmApi\Contracts\CrmMyApi;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;
use Modules\My\Data\Appeal\CreateBitrixAppealData;
use Modules\My\Events\MyAppealCreatedEvent;
use Modules\My\Data\Chat\BitrixChatMessageData;

class CreateAppealProcessing  extends AbstractMyListener implements ShouldQueue
{


    /**
     * @deprecated
     * @throws \Exception
     * @var MyAppealCreatedEvent $event
     */
    public function handle(MyAppealCreatedEvent $event)
    {
        try {

            $appealBitrix = CreateBitrixAppealData::from($event->appeal);
            $appealBitrix->message = BitrixChatMessageData::from($event->appeal?->lastMessage);
            $appealBitrix->code = $event->countryCode;

            Log::info(json_encode($appealBitrix->toArray()));
            $response = app(CrmMyApi::class)->appealCreate($appealBitrix->toArray());

            $event->appeal->bitrix()->update(
                [
                    'bx_user_id' => $response->bx_user_id,
                    'bx_deal_id' => $response->bx_deal_id
                ]
            );
            Log::info(json_encode($response));

        } catch (\Exception $e){
            Log::error(json_encode($e->getMessage()));
            throw new \Exception($e->getMessage());
        }

    }

    public function failed(MyAppealCreatedEvent $event, $exception)
    {
        Log::error(json_encode($event));
        throw new \Exception("Ошибка обработки Обращения собственника: " . $exception);

    }
}
