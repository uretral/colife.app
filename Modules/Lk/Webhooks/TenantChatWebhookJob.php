<?php


namespace Modules\Lk\Webhooks;

use App\Helpers\Helper;
use App\Services\Bitrix\Data\Chats\BitrixEventChatMessageData;
use Illuminate\Support\Facades\Log;
use Modules\Lk\Entities\Chat;
use Modules\Lk\Entities\User;
use Modules\Lk\Events\ChatUpdatedEvent;
use Modules\Lk\Events\TenantNotificationEvent;
use Spatie\WebhookClient\Jobs\ProcessWebhookJob;

class TenantChatWebhookJob extends ProcessWebhookJob
{

    public function handle()
    {
        try {

            Log::channel('webhooks')->info("Данные Вебхук" . json_encode($this->webhookCall->payload['data']));

            $message = BitrixEventChatMessageData::from($this->webhookCall->payload['data']);

            if ( !$chat = Chat::getByBitrixChatId($message->chat->id)->firstOrFail()) {
                Log::channel('webhooks')->info("Чат с жильцом не найден: " . $message->chat->id);
                throw new \Exception("Нет Chat ID в ЛК Жильца");
            }

            Helper::storeChatMessage($message, $chat);

            event(new ChatUpdatedEvent($chat));
            $chat->users()->each( fn(User $user) => event(new TenantNotificationEvent($user->id)) );

            return true;

        } catch (\Exception $e){
            Log::channel('webhooks')->info($e->getMessage());
            return false;
        }

    }

}
