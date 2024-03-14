<?php

namespace Modules\Lk\Events;

use Modules\Lk\Entities\Appeal;
use Modules\Lk\Entities\AppealMessage;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;
use Modules\Lk\Repositories\UserRepository;

class TenantAppealMessageCreatedEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public Appeal         $appeal;
    private AppealMessage $message;
    public mixed          $countryCode;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Appeal $appeal, AppealMessage $message)
    {
        $this->appeal = $appeal;
        $this->message = $message;
        $this->countryCode = UserRepository::getAuthUserCountryCode();
    }


}
