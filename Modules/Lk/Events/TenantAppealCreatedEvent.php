<?php

namespace Modules\Lk\Events;

use Modules\Lk\Entities\Appeal;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use Modules\Lk\Repositories\UserRepository;

class TenantAppealCreatedEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public Appeal $appeal;
    public mixed  $countryCode;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Appeal $appeal)
    {
        $this->appeal = $appeal;
        $this->countryCode = UserRepository::getAuthUserCountryCode();
    }


}
