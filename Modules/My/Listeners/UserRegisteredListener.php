<?php

namespace Modules\My\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Log;
use Modules\CrmApi\Contracts\CrmMyApi;
use Modules\My\Events\UserRegisteredEvent;
use App\Services\Bitrix\Jobs\ProcessBitrixCreateTenantChat;

class UserRegisteredListener extends AbstractMyListener implements ShouldQueue
{

    /**
     * Handle the event.
     * @throws \Exception
     */
    public function handle(UserRegisteredEvent $event): void
    {

        if (!app(CrmMyApi::class)->isRegistered($event->contactId)) {
            throw new \Exception(self::class . " Ошибка обработки события: ". $event->contactId);
        }

    }

    public function failed(UserRegisteredEvent $event, $exception)
    {
        Log::error(json_encode($event));
        throw new \Exception("Ошибка обработки события: " . $exception);

    }
}
