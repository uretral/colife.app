<?php


namespace Modules\Lk\Webhooks;


use App\Helpers\Helper;
use App\Services\Bitrix\Data\Chats\BitrixEventChatMessageData;
use Illuminate\Support\Facades\Log;
use Modules\Lk\Entities\Appeal;
use Modules\Lk\Entities\User;
use Modules\Lk\Events\AppealUpdatedEvent;
use Modules\Lk\Events\TenantNotificationEvent;
use Spatie\WebhookClient\Jobs\ProcessWebhookJob;

class TenantAppealWebhookJob extends ProcessWebhookJob
{

    public function handle()
    {
        try {
            $message = BitrixEventChatMessageData::from($this->webhookCall->payload['data']);

            if (!$appeal = Appeal::getByBitrixChatId($message->chat->id)->firstOrFail())
                throw new \Exception("Нет Appeal ID в ЛК Жильца");

            $supportId = Helper::addSupportToChat($appeal);
            Helper::storeAppealMessage($message, $appeal, $supportId);

            event(new AppealUpdatedEvent($appeal->id));
            $appeal->users()->each( fn(User $user) => event(new TenantNotificationEvent($user->id)) );

            return true;

        } catch (\Exception $e){
            Log::channel('webhooks')->info($e->getMessage());
            return false;
        }

    }

}
