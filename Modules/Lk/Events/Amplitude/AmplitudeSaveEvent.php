<?php

namespace Modules\Lk\Events\Amplitude;

use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use Modules\Lk\Entities\User;

class AmplitudeSaveEvent extends AmplitudeBaseEvent
{

    public User $user;

    public function __construct(User $user)
    {
        parent::__construct();
        $this->user = $user;
    }

}
