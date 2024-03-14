<?php

namespace Modules\My\Jobs\Amplitude;

use Modules\My\Jobs\AmplitudeJob;

class AmplitudeForgotPasswordJob extends AmplitudeJob
{

    public function __construct(array $attributes = [])
    {
        parent::__construct();

        $this->attributes = $attributes;
        $this->attributes['type'] = 'Авторизация';
        $this->attributes['name'] = 'Не помню пароль';
        $this->attributes['check'] = 'job';
        $this->event_name = 'forgot_password';
    }

    /**
     * Execute the job.

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
