<?php

namespace Modules\Lk\Listeners;

use App\Services\Bitrix\Actions\CrmChats\SendBitrixGroupChatMessageAction;
use Modules\CrmApi\Contracts\CrmLkApi;
use Modules\Lk\Data\Chat\BitrixChatMessageData;
use Modules\Lk\Data\Chat\CreateBitrixChatData;
use Modules\Lk\Entities\Chat;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Log;
use Modules\Lk\Events\TenantChatMessageCreatedEvent;

class CreateChatMessageProcessing  extends AbstractTenantListener implements ShouldQueue
{


    public function handle(TenantChatMessageCreatedEvent $event)
    {
        try {

            $chat = Chat::with(['users','bitrix'])->find($event->chat->id);
            $chatBitrix = CreateBitrixChatData::from($chat->toArray());
            $chatBitrix->message = BitrixChatMessageData::from($chat?->lastMessage->toArray());

            return match ($event->chat->is_group) {
                1 => app(SendBitrixGroupChatMessageAction::class)->run($chatBitrix->toArray()),
                default => app(CrmLkApi::class)->chatMessageCreated($chatBitrix->toArray(),$event->countryCode),
            };

        } catch (\Exception $e){
            throw new \Exception("Ошибка, отправки сообщения чата" . $e->getMessage());
        }

    }

    public function failed(TenantChatMessageCreatedEvent $event, $exception)
    {
        Log::error(json_encode($event));
        throw new \Exception("Ошибка чата: " . $exception);

    }
}
