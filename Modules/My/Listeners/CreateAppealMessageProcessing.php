<?php

namespace Modules\My\Listeners;

use Modules\CrmApi\Contracts\CrmMyApi;
use Modules\My\Data\Appeal\AppealData;
use Modules\My\Data\Appeal\CreateBitrixAppealData;
use Modules\My\Events\MyAppealMessageCreatedEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Log;

class CreateAppealMessageProcessing  extends AbstractMyListener implements ShouldQueue
{

    public function handle(MyAppealMessageCreatedEvent $event)
    {
        try {

            $appeal = AppealData::from($event->appeal);
            $appealBitrix = CreateBitrixAppealData::from($appeal->toArray());
            $appealBitrix->code = $event->countryCode;
            return app(CrmMyApi::class)->appealMessageCreate($appealBitrix->toArray(),$appeal->id);

        } catch (\Exception $e){
            throw new \Exception("Ошибка, сообщение чата обращения" . $e->getMessage());
        }

    }

    public function failed(MyAppealMessageCreatedEvent $event, $exception)
    {
        Log::error(json_encode($event));
        throw new \Exception("Ошибка обработки сообщения Обращения жильца: " . $exception);

    }
}
