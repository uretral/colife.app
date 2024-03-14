<?php

namespace Modules\Lk\Jobs\Amplitude;

use Modules\Lk\Jobs\AmplitudeJob;

class AmplitudeCreateRequestJob extends AmplitudeJob
{

    public function __construct(array $attributes = [])
    {
        parent::__construct();

        $this->attributes = $attributes;
        $this->attributes['type'] = 'Чат с поддержкой';
        $this->attributes['name'] = 'Открыто модальное окно создания обращения';
        $this->attributes['check'] = 'job';
        $this->event_name = 'create_request';
    }

    /**
     * Execute the job.
     * "время события
     * event_id
     * event_name
     * user_id
     * request_id - айди обращения"
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
