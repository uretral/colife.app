<?php

namespace Modules\My\Listeners;

use Exception;
use Modules\CrmApi\Contracts\CrmMyApi;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Log;
use Modules\My\Events\MyRequestMessageCreatedEvent;
use Modules\My\Data\Chat\BitrixChatMessageData;
use Modules\My\Data\Chat\CreateBitrixChatData;

class CreateRequestMessageProcessing  extends AbstractMyListener implements ShouldQueue
{

    /**
     * @throws Exception
     */
    public function handle(MyRequestMessageCreatedEvent $event)
    {
        try {
            $dto = $this->prepareData($event);
            $response = $this->sendRequest($event, $dto);

            Log::channel('my')->info('Ответ от Моста:', ["response" => $response]);
            return $response;

        } catch (Exception $e){
            throw new Exception("Ошибка, сообщение вх.обращение собственника" . $e->getMessage());
        }

    }

    protected function prepareData(MyRequestMessageCreatedEvent $event): ?CreateBitrixChatData
    {
        try {
            $dto = CreateBitrixChatData::from($event->request);
            $dto->message = BitrixChatMessageData::from($event->request?->lastMessage);
            $dto->code = $event->countryCode;

            Log::channel('my')->info('Отправили DTO:', ["dto" => $dto]);

            return $dto;
        } catch (Exception $e){
            throw new Exception("Ошибка, создания DTO для отправки в API" . $e->getMessage());
        }

    }

    /**
     * @throws Exception
     */
    public function failed(MyRequestMessageCreatedEvent $event, $exception)
    {
        $message = "Ошибка ответ на вх.обращение собственника ";
        Log::channel('my')->error($message,['event' => $event]);
        throw new Exception($message . $exception);

    }

    protected function sendRequest(MyRequestMessageCreatedEvent $event, ?CreateBitrixChatData $dto)
    {
        if ($event->is_first_reply) {
            $response = app(CrmMyApi::class)->requestFirstMessageCreate($dto->toArray(), $dto->request_id);
        } else {
            $response = app(CrmMyApi::class)->requestMessageCreate($dto->toArray(), $dto->request_id);
        }
        return $response;
    }

}
