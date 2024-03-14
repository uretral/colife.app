<?php

namespace Modules\Lk\Jobs\Amplitude;

use Modules\Lk\Jobs\AmplitudeJob;

class AmplitudeSupportJob extends AmplitudeJob
{

    public function __construct(array $attributes = [])
    {
        parent::__construct();

        $this->attributes = $attributes;
        $this->attributes['type'] = 'Авторизация';
        $this->attributes['name'] = 'Клик на кнопку обратиться в поддержку';
        $this->attributes['check'] = 'job';
        $this->event_name = 'support';
    }

    /**
     * Execute the job.
     * Время события
     * user_id
     * event_id
     * event_name
     * page - страница, на которой нажали на кнопку"
     *
     * передается при клике на кнопку "обратиться в поддержку"
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
