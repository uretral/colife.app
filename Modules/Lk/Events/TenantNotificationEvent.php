<?php


namespace Modules\Lk\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow;
use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Modules\Lk\Repositories\UserRepository;

class TenantNotificationEvent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $id;
    public mixed $countryCode;

    public function __construct($id)
    {
        $this->id = $id;
        $this->countryCode = UserRepository::getAuthUserCountryCode();

    }

    public function broadcastOn()
    {
        return new PrivateChannel('tenants.' . $this->id);
    }

    public function broadcastAs(): string
    {
        return 'tenantNotice';
    }

}
