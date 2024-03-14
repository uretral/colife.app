<?php

namespace Modules\Lk\Listeners\Amplitude;

use App\Services\Amplitude\Handle\AmplitudeFillRequest;
use Illuminate\Support\Facades\Log;
use Modules\Lk\Entities\Appeal;
use Modules\Lk\Events\Amplitude\MakeAppealEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Modules\Lk\Listeners\AbstractTenantListener;

class MakeAppealNotify  extends AbstractTenantListener implements ShouldQueue
{


    /**
     * Handle the event.
     *
     * @param  MakeAppealEvent  $event
     * @return void
     */
    public function handle(MakeAppealEvent $event)
    {
        try {
            $appeal = Appeal::find($event->message->appeal_id);

            AmplitudeFillRequest::handle([
                'topic' => $appeal?->theme?->title ?? '-',
                'topic_type' => $appeal?->themeType?->title ?? '-',
                'description' => $event->message->message,
                'request_id' => $event->message->appeal_id
            ]);

        } catch (\Exception $e){
            Log::error(json_encode($event));
            throw new \Exception(self::class . "Ошибка отправки информацию в Amplitude: " . $e->getMessage());
        }

    }
}
