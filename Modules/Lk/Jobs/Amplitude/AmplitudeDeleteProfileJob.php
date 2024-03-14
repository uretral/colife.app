<?php

namespace Modules\Lk\Jobs\Amplitude;

use Modules\Lk\Jobs\AmplitudeJob;

class AmplitudeDeleteProfileJob extends AmplitudeJob
{

    public function __construct(array $attributes = [])
    {
        parent::__construct();

        $this->attributes = $attributes;
        $this->attributes['type'] = 'Профиль';
        $this->attributes['name'] = 'Удалить профиль';
        $this->attributes['check'] = 'job';
        $this->event_name = 'delete_profile';
    }

    /**
     * Execute the job.
     * Время события
     * event_id
     * event_name
     * user_id
     *
     * передается при нажатии на кнопку "удалить профиль"
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
