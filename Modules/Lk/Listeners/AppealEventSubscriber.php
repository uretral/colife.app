<?php

namespace Modules\Lk\Listeners;

use App\Services\TenantAccount\Events\TenantAppealCreatedEvent;
use Illuminate\Support\Facades\Log;

class AppealEventSubscriber
{

    public function newAppeal($event) {
        Log::info('Сработал AppealEventSubscriber');
    }

    public function subscribe($events)
    {
        return [
            TenantAppealCreatedEvent::class => 'newAppeal',
        ];
    }
}
