<?php

namespace Modules\My\Listeners;

use Modules\CrmApi\Contracts\CrmMyApi;
use Modules\My\Data\Appeal\AppealData;
use Modules\My\Data\Appeal\BitrixAppealRateData;
use Modules\My\Events\MyAppealRateCreatedEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Log;

class CreateAppealRateProcessing  extends AbstractMyListener implements ShouldQueue
{

    /**
     * @throws \Exception
     */
    public function handle(MyAppealRateCreatedEvent $event)
    {
        try {

            $appeal = AppealData::from($event->appeal);
            $appealBitrix = BitrixAppealRateData::from($appeal->toArray());
            $appealBitrix->message->text = $event->rate;
            $appealBitrix->code = $event->countryCode;

            return app(CrmMyApi::class)->appealRated($appealBitrix->toArray());

        } catch (\Exception $e){
            throw new \Exception("Ошибка оценка обращения" . $e->getMessage());
        }

    }

    public function failed(MyAppealRateCreatedEvent $event, $exception)
    {
        Log::error(json_encode($event));
        throw new \Exception("Ошибка обработки оценки обращения: " . $exception);

    }
}
