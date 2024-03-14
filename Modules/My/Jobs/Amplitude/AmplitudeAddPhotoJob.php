<?php

namespace Modules\My\Jobs\Amplitude;

use Modules\My\Entities\User;
use Modules\My\Jobs\AmplitudeJob;

class AmplitudeAddPhotoJob extends AmplitudeJob
{

    public function __construct(array $attributes = [])
    {
        parent::__construct();
        $this->attributes = $attributes;
        $this->attributes['type'] = 'Регистрация';
        $this->attributes['name'] = 'Добавить аватар';
        $this->attributes['check'] = 'job';
        $this->event_name = 'add_photo';
    }

    /**
     * Execute the job.
     * Время события
     * время события
     * user_id
     * event_id
     * event_name
     * page - страница, на которой нажали на кнопку"
     *
     * передается при клике на "+"
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
