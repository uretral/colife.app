<?php


namespace Modules\My\Events\Request;

use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class RequestUpdatedEvent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public int $requestId;

    public function __construct($requestId)
    {
        $this->requestId = $requestId;
    }

    public function broadcastOn()
    {
        return new PrivateChannel('my.request.'.$this->requestId);
    }

    public function broadcastAs(): string
    {
        return 'myRequestUpdated';
    }

}
