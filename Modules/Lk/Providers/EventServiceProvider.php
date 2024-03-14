<?php

namespace Modules\Lk\Providers;

use Modules\Lk\Events\Amplitude\AmplitudeSaveEvent;
use Modules\Lk\Events\AppealUpdatedEvent;
use Modules\Lk\Events\ChatUpdatedEvent;
use Modules\Lk\Events\ProfileUpdatedEvent;
use Modules\Lk\Events\TenantAppealCreatedEvent;
use Modules\Lk\Events\TenantAppealMessageCreatedEvent;
use Modules\Lk\Events\TenantAppealRateCreatedEvent;
use Modules\Lk\Events\TenantChatMessageCreatedEvent;
use Modules\Lk\Events\TenantNotificationEvent;
use Modules\Lk\Events\UserEmailConfirmedEvent;
use Modules\Lk\Events\UserRegisteredEvent;
use Modules\Lk\Listeners\Amplitude\AmplitudeSaveListener;
use Modules\Lk\Listeners\CreateAppealMessageProcessing;
use Modules\Lk\Listeners\CreateAppealProcessing;
use Modules\Lk\Listeners\CreateAppealRateProcessing;
use Modules\Lk\Listeners\CreateChatMessageProcessing;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Log;
use Modules\Lk\Listeners\ProfileUpdateListener;
use Modules\Lk\Listeners\UserEmailConfirmedListener;
use Modules\Lk\Listeners\UserRegisteredListener;
use Throwable;

use function Illuminate\Events\queueable;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event to listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        UserEmailConfirmedEvent::class => [
            UserEmailConfirmedListener::class
        ],
        UserRegisteredEvent::class => [
            UserRegisteredListener::class
        ],

        TenantAppealCreatedEvent::class => [
            CreateAppealProcessing::class
        ],

        TenantAppealMessageCreatedEvent::class => [
            CreateAppealMessageProcessing::class
        ],

        TenantAppealRateCreatedEvent::class => [
            CreateAppealRateProcessing::class
        ],

        TenantChatMessageCreatedEvent::class => [
            CreateChatMessageProcessing::class
        ],

        ProfileUpdatedEvent::class => [
            ProfileUpdateListener::class
        ],

        // Broadcasting events
        TenantNotificationEvent::class => [],
        ChatUpdatedEvent::class => [],
        AppealUpdatedEvent::class => [],

    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
    }

}
