<?php

namespace Modules\My\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Modules\CrmApi\Contracts\CrmMyApi;
use Modules\My\Events\UserEmailConfirmedEvent;

/**
 * Отправка в Битрикс чекбокс: Почта подтверждена
 * Class UserEmailConfirmedListener
 * @package App\Services\Bitrix\Listeners
 */
class UserEmailConfirmedListener extends AbstractMyListener implements ShouldQueue
{

    /**
     * Отправка в Битрикс API: Почта подтверждена
     * @throws \Exception
     */
    public function handle(UserEmailConfirmedEvent $event): void
    {
        $response = app(CrmMyApi::class)->emailConfirmed($event->contactId);

        if (!$response) {
            throw new \Exception(self::class . " Ошибка обработки события: ". $event->contactId);
        }
    }
}
