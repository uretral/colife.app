<?php

namespace Modules\Lk\Jobs\Amplitude;

use Modules\Lk\Jobs\AmplitudeJob;

class AmplitudeIsMasterJob extends AmplitudeJob
{

    public function __construct(array $attributes = [])
    {
        parent::__construct();

        $this->attributes = $attributes;
        $this->attributes['type'] = 'Настройки и документы';
        $this->attributes['name'] = 'Настройки - мастер';
        $this->attributes['check'] = 'job';
        $this->event_name = 'is_master';
    }

    /**
     * Execute the job.
     * Время события
     * event_id
     * event_name
     * user_id
     * is_enabled - True/False
     *
     * передается при изменении положения тумблера Посещение мастера
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
