<?php

namespace Modules\Lk\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Modules\CrmApi\Contracts\CrmLkApi;
use Modules\Lk\Events\UserEmailConfirmedEvent;

/**
 * Отправка в Битрикс чекбокс: Почта подтверждена
 * Class UserEmailConfirmedListener
 * @package App\Services\Bitrix\Listeners
 */
class UserEmailConfirmedListener extends AbstractTenantListener implements ShouldQueue
{

    /**
     * Отправка в Битрикс API: Почта подтверждена
     * @throws \Exception
     */
    public function handle(UserEmailConfirmedEvent $event): void
    {
        if (!app(CrmLkApi::class)->emailConfirmed($event->contactId, $event->countryCode )) {
            throw new \Exception(self::class . " Ошибка обработки события: ". $event->contactId);
        }
    }
}
