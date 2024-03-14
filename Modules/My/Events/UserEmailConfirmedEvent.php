<?php

namespace Modules\My\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class UserEmailConfirmedEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public int $contactId;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(int $contactId)
    {
        $this->contactId = $contactId;
    }

}
