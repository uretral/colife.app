<?php

namespace Modules\My\Providers;

use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Log;
use Modules\My\Events\AppealUpdatedEvent;
use Modules\My\Events\ChatUpdatedEvent;
use Modules\My\Events\MyAppealCreatedEvent;
use Modules\My\Events\MyAppealMessageCreatedEvent;
use Modules\My\Events\MyAppealRateCreatedEvent;
use Modules\My\Events\MyChatMessageCreatedEvent;
use Modules\My\Events\MyNotificationEvent;
use Modules\My\Events\MyRequestMessageCreatedEvent;
use Modules\My\Events\ProfileContactEvent;
use Modules\My\Events\ProfilePhoneEvent;
use Modules\My\Events\ProfileUpdatedEvent;
use Modules\My\Events\Request\RequestUpdatedEvent;
use Modules\My\Events\UserEmailConfirmedEvent;
use Modules\My\Events\UserRegisteredEvent;
use Modules\My\Listeners\CreateAppealMessageProcessing;
use Modules\My\Listeners\CreateAppealProcessing;
use Modules\My\Listeners\CreateAppealRateProcessing;
use Modules\My\Listeners\CreateChatMessageProcessing;
use Modules\My\Listeners\CreateRequestMessageProcessing;
use Modules\My\Listeners\ProfileContactListener;
use Modules\My\Listeners\ProfilePhoneListener;
use Modules\My\Listeners\ProfileUpdateListener;
use Modules\My\Listeners\UserEmailConfirmedListener;
use Modules\My\Listeners\UserRegisteredListener;
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

        MyAppealCreatedEvent::class => [
            CreateAppealProcessing::class
        ],

        MyAppealMessageCreatedEvent::class => [
            CreateAppealMessageProcessing::class
        ],

        MyRequestMessageCreatedEvent::class => [
            CreateRequestMessageProcessing::class
        ],

        MyAppealRateCreatedEvent::class => [
            CreateAppealRateProcessing::class
        ],

        MyChatMessageCreatedEvent::class => [
            CreateChatMessageProcessing::class
        ],

        ProfileUpdatedEvent::class => [
            ProfileUpdateListener::class
        ],

        ProfilePhoneEvent::class => [ProfilePhoneListener::class],
        ProfileContactEvent::class => [ProfileContactListener::class],

        // Broadcasting events
        MyNotificationEvent::class => [],
        RequestUpdatedEvent::class => [],
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
