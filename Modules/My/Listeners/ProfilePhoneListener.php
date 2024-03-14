<?php

namespace Modules\My\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Modules\CrmApi\Contracts\CrmMyApi;
use Modules\My\Entities\User;
use Modules\My\Events\ProfilePhoneEvent;
use Modules\My\Events\ProfileUpdatedEvent;

class ProfilePhoneListener extends AbstractMyListener implements ShouldQueue
{


    /**
     * Handle the event.
     * @throws \Exception
     */
    public function handle(ProfilePhoneEvent $event): void
    {
        try {

            app(CrmMyApi::class)->phoneUpdate(
                payload: [
                    'phone' => $event->phone,
                    'phone_old' => $event->phone_old,
                    'code' => $event->countryCode
                ],
                landlordId: $event->userBxId
            );

        } catch (\Exception $e){
            throw new \Exception(self::class . " Ошибка отправки доп. телефона: " .$e->getMessage());
        }




    }
}
