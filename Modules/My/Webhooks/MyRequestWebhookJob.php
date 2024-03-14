<?php


namespace Modules\My\Webhooks;


use App\Helpers\Helper;
use App\Services\Bitrix\Data\Chats\BitrixEventChatMessageData;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;
use Modules\My\Entities\Appeal;
use Modules\My\Entities\Request;
use Modules\My\Entities\User;
use Modules\My\Events\AppealUpdatedEvent;
use Modules\My\Events\MyNotificationEvent;
use Modules\My\Events\Request\RequestUpdatedEvent;
use Spatie\WebhookClient\Jobs\ProcessWebhookJob;

class MyRequestWebhookJob extends ProcessWebhookJob
{
    public $queue = 'my_queue';

    public function handle()
    {
        try {

            $message = BitrixEventChatMessageData::from($this->webhookCall->payload['data']);

            $request = $this->findOrFailRequestByChatId($message);
            Helper::storeMyRequestMessage($message, $request);

            event(new RequestUpdatedEvent($request->id));
            $request->users()->each( fn(User $user) => event(new MyNotificationEvent($user->id)) );

            return true;

        } catch (\Exception $e){
            Log::channel('webhooks')->info($e->getMessage());
            return false;
        }

    }

    protected function findOrFailRequestByChatId(BitrixEventChatMessageData $message
    ): Builder|Request|Model {
        if (!$request = Request::getByBitrixChatId($message->chat->id)->firstOrFail()) {
            throw new \Exception("Нет Appeal ID в ЛК Собственника");
        }
        Log::channel('webhooks')->info("MyRequestWebhookJob, Обращение найдено: " . $request->id);
        return $request;
    }

}
