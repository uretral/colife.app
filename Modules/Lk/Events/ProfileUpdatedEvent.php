<?php

namespace Modules\Lk\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use Modules\Lk\Repositories\UserRepository;

class ProfileUpdatedEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public mixed $userId;
    public mixed $countryCode;


    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($userId)
    {
        $this->userId = $userId;
        $this->countryCode = UserRepository::getAuthUserCountryCode();
    }

}
