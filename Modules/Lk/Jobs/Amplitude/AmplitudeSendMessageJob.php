<?php

namespace Modules\Lk\Jobs\Amplitude;

use Modules\Lk\Jobs\AmplitudeJob;

class AmplitudeSendMessageJob extends AmplitudeJob
{

    public function __construct(array $attributes = [])
    {
        parent::__construct();

        $this->attributes = $attributes;
        $this->attributes['type'] = 'Чат с поддержкой';
        $this->attributes['name'] = 'Отправка обращения';
        $this->attributes['check'] = 'job';
        $this->event_name = 'send_message';
    }

    /**
     * Execute the job.
     * время события
     * event_id
     * event_name
     * user_id
     * text - текст сообщения"
     * передается при клике на кнопку отправки сообщения
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
