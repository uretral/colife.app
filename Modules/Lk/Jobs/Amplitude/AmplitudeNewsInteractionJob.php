<?php

namespace Modules\Lk\Jobs\Amplitude;

use Modules\Lk\Jobs\AmplitudeJob;

class AmplitudeNewsInteractionJob extends AmplitudeJob
{

    public function __construct(array $attributes = [])
    {
        parent::__construct();

        $this->attributes = $attributes;
        $this->attributes['type'] = 'Главная';
        $this->attributes['name'] = 'Клик на новость';
        $this->attributes['check'] = 'job';
        $this->event_name = 'news_interaction';
    }

    /**
     * Execute the job.
     * Время события
     * event_id
     * event_name
     * topic - название новости
     * is_full_mode - флаг раскрытой новости?
     * reactions_used - использованные смайлики (если пользователь не оставил смайлик, null)
     * published_at - дата публикации
     *
     * передается при нажатии на область с новостью
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
