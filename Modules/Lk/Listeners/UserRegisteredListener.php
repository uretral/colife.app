<?php

namespace Modules\Lk\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Log;
use Modules\CrmApi\Contracts\CrmLkApi;
use Modules\Lk\Events\UserRegisteredEvent;
use App\Services\Bitrix\Jobs\ProcessBitrixCreateTenantChat;

class UserRegisteredListener extends AbstractTenantListener implements ShouldQueue
{

    /**
     * Handle the event.
     * @throws \Exception
     */
    public function handle(UserRegisteredEvent $event): void
    {

        $response = app(CrmLkApi::class)->isRegistered($event->contactId, $event->countryCode);
        if (!$response) {
            throw new \Exception(self::class . " Ошибка обработки события, возможно не работает связь с мостом: ". $event->contactId);
        }

        Log::channel('tenant')->info('Создаем чат с жильцом, отправляем событие ProcessBitrixCreateTenantChat::dispatch');
        // Создает чат с жильцом, и далее чат с квартирой или добавляет в него пользователя
        ProcessBitrixCreateTenantChat::dispatch($event->contactId, $event->countryCode);

    }
}
