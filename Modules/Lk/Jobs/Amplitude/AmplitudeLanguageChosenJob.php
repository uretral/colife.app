<?php

namespace Modules\Lk\Jobs\Amplitude;

use Modules\Lk\Jobs\AmplitudeJob;

class AmplitudeLanguageChosenJob extends AmplitudeJob
{

    public function __construct(array $attributes = [])
    {
        parent::__construct();

        $this->attributes = $attributes;
        $this->attributes['type'] = 'Профиль';
        $this->attributes['name'] = 'Выбор языка';
        $this->attributes['check'] = 'job';
        $this->event_name = 'language_chosen';
    }

    /**
     * Execute the job.
     * время события
     * event_id
     * event_name
     * user_id
     * language - rus / eng (по умолчанию стоит язык выбранный во время первой сессии)
     *
     *передается при выборе языка
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
