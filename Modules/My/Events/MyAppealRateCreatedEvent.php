<?php

namespace Modules\My\Events;

use Modules\My\Entities\Appeal;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;
use Modules\My\Repositories\UserRepository;

class MyAppealRateCreatedEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public Appeal $appeal;
    public int    $rate;
    public mixed  $countryCode;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Appeal $appeal)
    {
        $rate = match ($appeal->score) {
            4, 5 => 1,
            default => 0
        };

        $this->appeal = $appeal;
        $this->rate = $rate;
        $this->countryCode = UserRepository::getAuthUserCountryCode();
    }


}
