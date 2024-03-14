<?php

namespace Modules\Lk\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Modules\CrmApi\Contracts\CrmLkApi;
use Modules\Lk\Entities\User;
use Modules\Lk\Events\ProfileUpdatedEvent;

class ProfileUpdateListener extends AbstractTenantListener implements ShouldQueue
{


    /**
     * Handle the event.
     * @throws \Exception
     */
    public function handle(ProfileUpdatedEvent $event): void
    {
        try {
            $user = User::withTrashed()->find($event->userId);
            $response = app(CrmLkApi::class)->profileUpdate($user->toArray());
            if (!$response) {
                throw new \Exception(self::class . " Ошибка обработки события, возможно не работает связь с мостом: ");
            }

        } catch (\Exception $e){
            throw new \Exception(self::class . " Ошибка отправки профиля: " .$e->getMessage());
        }




    }
}
