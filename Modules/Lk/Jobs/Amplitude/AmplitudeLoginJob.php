<?php

namespace Modules\Lk\Jobs\Amplitude;

use Modules\Lk\Jobs\AmplitudeJob;

class AmplitudeLoginJob extends AmplitudeJob
{

    public function __construct(array $attributes = [])
    {
        parent::__construct();

        $this->attributes = $attributes;
        $this->attributes['type'] = 'Авторизация';
        $this->attributes['name'] = 'Логин';
        $this->attributes['check'] = 'job';
        $this->event_name = 'login';
    }

    /**
     * Execute the job.
     * Передается при клике на кнопку "войти"
     * Время события
     * is_success - флаг успешной авторизации
     * user_id - айди пользователя
     * event_id - айди события
     * event_name - название события
     * error_message - текст ошибки (передавать при неуспешной попытке входа, иначе передавать null)"
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
