<?php

namespace Modules\My\Listeners;

use Modules\CrmApi\Contracts\CrmMyApi;
use Modules\My\Data\Chat\BitrixChatMessageData;
use Modules\My\Data\Chat\CreateBitrixChatData;
use Modules\My\Entities\Chat;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Log;
use Modules\My\Events\MyChatMessageCreatedEvent;

class CreateChatMessageProcessing  extends AbstractMyListener implements ShouldQueue
{


    public function handle(MyChatMessageCreatedEvent $event)
    {
        try {

            $chat = Chat::with(['users','bitrix'])->find($event->chat->id);
            $chatBitrix = CreateBitrixChatData::from($chat->toArray());
            $chatBitrix->message = BitrixChatMessageData::from($chat?->lastMessage->toArray());

            return match ($event->chat->is_group) {
                1 => ['CrmMyApi groupChatMethod here'],
                default => app(CrmMyApi::class)->chatMessageCreated($chatBitrix->toArray()),
            };

        } catch (\Exception $e){
            throw new \Exception("Ошибка, отправки сообщения чата" . $e->getMessage());
        }

    }

    public function failed(MyChatMessageCreatedEvent $event, $exception)
    {
        Log::error(json_encode($event));
        throw new \Exception("Ошибка чата: " . $exception);

    }
}
