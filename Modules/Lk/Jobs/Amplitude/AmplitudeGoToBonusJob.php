<?php

namespace Modules\Lk\Jobs\Amplitude;

use Modules\Lk\Jobs\AmplitudeJob;

class AmplitudeGoToBonusJob extends AmplitudeJob
{

    public function __construct(array $attributes = [])
    {
        parent::__construct();

        $this->attributes = $attributes;
        $this->attributes['type'] = 'Профиль';
        $this->attributes['name'] = 'Переход на страницу бонусов';
        $this->attributes['check'] = 'job';
        $this->event_name = 'go_to_bonus';
    }

    /**
     * Execute the job.
     * Время события
     * event_id
     * event_name
     * user_id
     *
     * передается при нажатии на стрелочку рядом с бонусами
     *
     * @return void
     */
    public function handle(): void
    {
        try {

            $this->send($this->attributes);

        } catch (\Exception $e) {

            \Log::channel('amplitude')->error(self::class . ' ' . $e->getMessage() . PHP_EOL);

        }
    }
}
