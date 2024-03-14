<?php

namespace Modules\My\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class UserRegisteredEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public int $contactId;
    public mixed $countryCode;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(int $contactId, string $countryCode)
    {
        $this->contactId = $contactId;
        $this->countryCode = $countryCode;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
