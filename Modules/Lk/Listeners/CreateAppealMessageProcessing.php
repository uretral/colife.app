<?php

namespace Modules\Lk\Listeners;

use Modules\CrmApi\Contracts\CrmLkApi;
use Modules\Lk\Data\Chat\BitrixChatMessageData;
use Modules\Lk\Data\Chat\CreateBitrixChatData;
use Modules\Lk\Events\TenantAppealMessageCreatedEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Log;

class CreateAppealMessageProcessing  extends AbstractTenantListener implements ShouldQueue
{

    public function handle(TenantAppealMessageCreatedEvent $event)
    {
        try {

            $chatBitrix = CreateBitrixChatData::from($event->appeal);
            $chatBitrix->message = BitrixChatMessageData::from($event->appeal?->lastMessage);

            return app(CrmLkApi::class)->appealMessageCreate($chatBitrix->toArray(),$event->appeal->id,$event->countryCode);

        } catch (\Exception $e){
            throw new \Exception("Ошибка, сообщение чата обращения" . $e->getMessage());
        }

    }

    public function failed(TenantAppealMessageCreatedEvent $event, $exception)
    {
        Log::error(json_encode($event));
        throw new \Exception("Ошибка обработки сообщения Обращения жильца: " . $exception);

    }
}
