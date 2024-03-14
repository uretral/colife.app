<?php

namespace Modules\Lk\Jobs\Amplitude;

use Modules\Lk\Jobs\AmplitudeJob;

class AmplitudeSearchFormActivatedJob extends AmplitudeJob
{

    public function __construct(array $attributes = [])
    {
        parent::__construct();

        $this->attributes = $attributes;
        $this->attributes['type'] = 'Главная';
        $this->attributes['name'] = 'Ввод в поле поиска на главной';
        $this->attributes['check'] = 'job';
        $this->event_name = 'search_form_activated';
    }

    /**
     * Execute the job.
     * Время события
     * user_id
     *
     * передается при нажатии на поисковую строку
     *
     * @return void
     */
    public function handle(): void
    {
        try {

          $this->send($this->attributes);

        } catch (\Exception $e) {

            \Log::channel('lkAmplitude')->error(self::class . ' ' . $e->getMessage() . PHP_EOL);

        }
    }
}
