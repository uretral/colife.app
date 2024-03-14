<?php


namespace Modules\My\Events;

use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class AppealUpdatedEvent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $appealId;

    public function __construct($appealId)
    {
        $this->appealId = $appealId;
    }

    public function broadcastOn()
    {
        return new PrivateChannel('my.appeals.'.$this->appealId);
    }

    public function broadcastAs(): string
    {
        return 'myAppealUpdated';
    }

}
