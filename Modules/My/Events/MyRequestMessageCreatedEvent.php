<?php

namespace Modules\My\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use Modules\My\Entities\Request;
use Modules\My\Entities\RequestMessage;
use Modules\My\Repositories\UserRepository;

class MyRequestMessageCreatedEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public Request        $request;
    public RequestMessage $message;
    public mixed          $countryCode;
    public mixed          $is_first_reply;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Request $request, RequestMessage $message)
    {
        $this->request = $request;
        $this->message = $message;
        $this->isFirstReply($request);
    }

    protected function isFirstReply(Request $request, $count = 1): void
    {
        $user = UserRepository::getAuthUser();
        $this->is_first_reply = $request->messages()
                ->where('author_id', $user->id)
                ->count() <= $count;

        $this->countryCode = $user->country_code;
    }


}
