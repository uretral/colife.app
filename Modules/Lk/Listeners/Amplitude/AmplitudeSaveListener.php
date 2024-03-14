<?php

namespace Modules\Lk\Listeners\Amplitude;

use App\Services\Amplitude\Amplitude;
use Modules\Lk\Events\Amplitude\AmplitudeSaveEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Modules\Lk\Helpers\TenantHelper;
use Modules\Lk\Listeners\AbstractTenantListener;

class AmplitudeSaveListener extends AbstractTenantListener implements ShouldQueue
{

    public function handle(AmplitudeSaveEvent $event)
    {
        try {
            $attributes =
                [
                    'type'=>'Профиль',
                    'name'=>'Сохранить профиль',

                    'job'       => $event->user->attributes?->position?->title ?? 'null',
                    'interests' => TenantHelper::getUserInterestsAsString($event->user->attributes->interests),
                    'about_me'  => $event->user->attributes->about ?? 'null',
                    'telegram'  => $event->user->attributes->telegram ?? 'null',
                    'instagram' => $event->user->attributes->instagram ?? 'null',
                    'facebook'  => $event->user->attributes->facebook ?? 'null',
                    'vkontakte' => $event->user->attributes->vkontakte ?? 'null',

                ];

            // TODO: Подумать Можно ли как то вынести в метод, класс абстракцию?
            $post_data = [
                "event_type"       => 'save',
                "user_id"          => $event->user_email,
                'language'         => $event->user_locale,
                'time'             => time(),
                'event_id'         => time(),
                'event_properties' => $attributes
            ];

            \Log::channel('amplitude')->info(json_encode($post_data) . PHP_EOL);

//            return Amplitude::post($post_data);
        } catch (\Exception $e) {
            \Log::channel('amplitude')->error(self::class . ' ' . $e->getMessage() . PHP_EOL);
            return true;
        }
    }
}
