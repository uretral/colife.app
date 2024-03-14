<?php

namespace Modules\My\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Modules\CrmApi\Contracts\CrmMyApi;
use Modules\My\Entities\User;
use Modules\My\Events\ProfileContactEvent;
use Modules\My\Events\ProfileUpdatedEvent;

class ProfileContactListener extends AbstractMyListener implements ShouldQueue
{


    /**
     * Handle the event.
     * @throws \Exception
     */
    public function handle(ProfileContactEvent $event): void
    {
        try {
            app(CrmMyApi::class)->contactUpdate(
                payload: [
                'contact' => $event->contact,
                'code' => $event->countryCode ],
                landlordId: $event->userBxId
            );

        } catch (\Exception $e){
            throw new \Exception(self::class . " Ошибка отправки доп. контакта: " . $e->getMessage());
        }




    }
}
