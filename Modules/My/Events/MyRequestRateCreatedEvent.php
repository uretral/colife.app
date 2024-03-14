<?php

namespace Modules\My\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use Modules\My\Entities\Request;

class MyRequestRateCreatedEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public Request $request;
    public int   $rate;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Request $request)
    {
        $rate = match ($request->score) {
            4, 5 => 1,
            default => 0
        };

       $this->request = $request;
       $this->rate = $rate;
    }


}
