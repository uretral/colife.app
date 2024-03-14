<?php

namespace Modules\Lk\Listeners;

use Modules\CrmApi\Contracts\CrmLkApi;
use Modules\Lk\Data\Appeal\AppealData;
use Modules\Lk\Data\Appeal\BitrixAppealRateData;
use Modules\Lk\Events\TenantAppealRateCreatedEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Log;

class CreateAppealRateProcessing  extends AbstractTenantListener implements ShouldQueue
{

    public function handle(TenantAppealRateCreatedEvent $event)
    {
        try {

            $appeal = AppealData::from($event->appeal);
            $appealBitrix = BitrixAppealRateData::from($appeal->toArray());
            $appealBitrix->message->text = $event->rate;

            return app(CrmLkApi::class)->appealRated($appealBitrix->toArray(),$event->countryCode);


        } catch (\Exception $e){
            throw new \Exception("Ошибка оценка обращения" . $e->getMessage());
        }

    }

    public function failed(TenantAppealRateCreatedEvent $event, $exception)
    {
        Log::error(json_encode($event));
        throw new \Exception("Ошибка обработки оценки обращения: " . $exception);

    }
}
