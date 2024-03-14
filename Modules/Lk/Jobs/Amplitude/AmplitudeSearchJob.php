<?php

namespace Modules\Lk\Jobs\Amplitude;

use Modules\Lk\Jobs\AmplitudeJob;

class AmplitudeSearchJob extends AmplitudeJob
{

    public function __construct(array $attributes = [])
    {
        parent::__construct();

        $this->attributes = $attributes;
        $this->attributes['type'] = 'Главная';
        $this->attributes['name'] = 'Поисковый запрос';
        $this->attributes['check'] = 'job';
        $this->event_name = 'search';
    }

    /**
     * Execute the job.
     * Время события
     * user_id
     * search_request - поисковый запрос
     * search_results - кол-во новостей"
     *
     *передается при нажатии на знак лупы
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
