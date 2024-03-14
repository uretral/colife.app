<?php

namespace Modules\My\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Modules\CrmApi\Contracts\CrmMyApi;
use Modules\My\Entities\User;
use Modules\My\Events\ProfileUpdatedEvent;

class ProfileUpdateListener extends AbstractMyListener implements ShouldQueue
{


    /**
     * Handle the event.
     * @throws \Exception
     */
    public function handle(ProfileUpdatedEvent $event): void
    {
        try {
            $user = User::withTrashed()->find($event->userId);
            $user->code = $user->country_code;
            app(CrmMyApi::class)->profileUpdate($user->toArray());

        } catch (\Exception $e){
            throw new \Exception(self::class . " Ошибка отправки профиля: " .$e->getMessage());
        }




    }
}
