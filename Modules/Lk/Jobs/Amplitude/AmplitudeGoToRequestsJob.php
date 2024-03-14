<?php

namespace Modules\Lk\Jobs\Amplitude;

use Modules\Lk\Jobs\AmplitudeJob;

class AmplitudeGoToRequestsJob extends AmplitudeJob
{

    public function __construct(array $attributes = [])
    {
        parent::__construct();

        $this->attributes = $attributes;
        $this->attributes['type'] = 'Чат с поддержкой';
        $this->attributes['name'] = 'Отправка обращения';
        $this->attributes['check'] = 'job';
        $this->event_name = 'go_to_requests';
    }

    /**
     * Execute the job.
     * Время события
     * event_id
     * event_name
     * user_id
     * updates - кол-во изменений (указывается напротив слова ""обращения"")
     * request_id
     * request_status
     *
     * передается при клике на кнопку Обращения
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
