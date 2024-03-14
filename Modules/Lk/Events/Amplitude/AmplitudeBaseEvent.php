<?php

namespace Modules\Lk\Events\Amplitude;

use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class AmplitudeBaseEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public mixed $user_email;
    public mixed $user_locale;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->user_email =  \Auth::guard('lk')->user()?->email ?? 'unregistered';
        $this->user_locale =  \Auth::guard('lk')->user()?->locale ?? 'default';
    }

    /**
     * Get the channels the event should be broadcast on.
     *
     * @return array
     */
    public function broadcastOn()
    {
        return [];
    }
}
