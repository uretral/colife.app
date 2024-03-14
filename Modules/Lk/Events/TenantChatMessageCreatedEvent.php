<?php

namespace Modules\Lk\Events;

use Modules\Lk\Entities\User;
use Modules\Lk\Entities\Chat;
use Modules\Lk\Entities\ChatMessage;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;
use Modules\Lk\Repositories\UserRepository;

class TenantChatMessageCreatedEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;


    public ChatMessage $message;
    /**
     * @var Chat|Chat[]|Collection|Model|null
     */
    public array|null|Collection|Model|Chat $chat;
    /**
     * @var mixed|string|null
     */
    public mixed $chat_user_id;

    public string $countryCode;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(int $chatId, ChatMessage $message)
    {
        try {
            $userId = auth()->guard('lk')->user()->id;
            $this->chat = Chat::find($chatId);
            $this->message = $message;
            $this->chat_user_id = User::find($userId)?->chatAttributes?->bx_chat_user_id;
            $this->countryCode = UserRepository::getAuthUserCountryCode();

        } catch (\Exception $e){
            throw new \Exception("Ошибка отправки сообщения чата: " . $e->getMessage());
        }

    }


}
