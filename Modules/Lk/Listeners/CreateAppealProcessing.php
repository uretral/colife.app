<?php

namespace Modules\Lk\Listeners;

use Modules\CrmApi\Contracts\CrmLkApi;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Log;
use Modules\Lk\Data\Chat\BitrixChatMessageData;
use Modules\Lk\Data\Chat\CreateBitrixChatData;
use Modules\Lk\Events\TenantAppealCreatedEvent;

class CreateAppealProcessing  extends AbstractTenantListener implements ShouldQueue
{

    public function handle(TenantAppealCreatedEvent $event)
    {
        try {

            $chatBitrix = CreateBitrixChatData::from($event->appeal);
            $chatBitrix->message = BitrixChatMessageData::from($event->appeal?->lastMessage);
            $response = app(CrmLkApi::class)->appealCreate($chatBitrix->toArray(),$event->countryCode);
            Log::info(json_encode($response->toArray()));

            $event->appeal->bitrix()->update(
                [
                    'bx_user_id' => $response->bx_user_id,
                    'bx_deal_id' => $response->bx_deal_id
                ]
            );

            Log::channel('bitrix')->info(json_encode($response));
        } catch (\Exception $e){
            throw new \Exception($e->getMessage());
        }

    }

    public function failed(TenantAppealCreatedEvent $event, $exception)
    {
        Log::error(json_encode($event));
        throw new \Exception("Ошибка обработки Обращения жильца: " . $exception);

    }
}
