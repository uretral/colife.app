<?php

namespace Modules\Lk\Jobs\Amplitude;

use Modules\Lk\Entities\User;
use Modules\Lk\Helpers\TenantHelper;
use Modules\Lk\Jobs\AmplitudeJob;

class AmplitudeProfileAdditionalInfoSaveJob extends AmplitudeJob
{

    protected User $user;

    public function __construct(User $user, $event_name = 'save')
    {
        parent::__construct();
        $this->user = $user;
        $this->event_name = $event_name;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(): void
    {
        try {
            $attributes =
                [
                    'type' => 'Профиль',
                    'name' => 'Сохранить профиль',

                    'job' => $this->user->attributes?->position?->title ?? 'null',
                    'interests' => TenantHelper::getUserInterestsAsString($this->user->attributes->interests),
                    'about_me' => $this->user->attributes->about ?? 'null',
                    'telegram' => $this->user->attributes->telegram ?? 'null',
                    'instagram' => $this->user->attributes->instagram ?? 'null',
                    'facebook' => $this->user->attributes->facebook ?? 'null',
                    'vkontakte' => $this->user->attributes->vkontakte ?? 'null',

                ];

            $this->send($attributes);

        } catch (\Exception $e) {
            \Log::channel('lkAmplitude')->error(self::class . ' ' . $e->getMessage() . PHP_EOL);
        }
    }
}
