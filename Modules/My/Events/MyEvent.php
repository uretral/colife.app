<?php

namespace Modules\My\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use Modules\My\Entities\User;
use Modules\My\Repositories\UserRepository;

abstract class MyEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public mixed $userId;
    public mixed $userBxId;
    public mixed $countryCode;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($userId)
    {
        $user = UserRepository::getAuthUser();
        $this->userId = $user->id;
        $this->userBxId = $user->bx_id;
        $this->countryCode = $user->country_code;
    }

}
