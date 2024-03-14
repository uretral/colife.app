<?php

namespace Modules\Lk\Events;

use Modules\Lk\Entities\Appeal;
use Modules\Lk\Entities\Chat;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;
use Modules\Lk\Repositories\UserRepository;

class TenantGroupChatMessageCreatedEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public Chat $chat;
    public mixed $countryCode;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Chat $chat)
    {
        $this->chat = $chat;
        $this->countryCode = UserRepository::getAuthUserCountryCode();
    }


}
