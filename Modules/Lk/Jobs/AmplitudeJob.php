<?php

namespace Modules\Lk\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Modules\Lk\Services\Amplitude;

class AmplitudeJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected mixed $user_id;
    protected string $user_locale = '';
    protected string $event_name = '';
    protected array $attributes = [];

    public function __construct()
    {
        $this->user_id = \Auth::guard('lk')->user()?->email ?? 'unregistered';
        $this->user_locale = \Auth::guard('lk')->user()?->locale ?? 'default';
    }


    public function handle()
    {
        //
    }

    protected function send(array $attributes)
    {
        $post_data = [
            "event_type" => $this->event_name,
            "user_id" => $this->user_id,
            'language' => $this->user_locale,
            'time' => time(),
            'event_id' => time(),
            'event_properties' => $attributes
        ];

        $job = Amplitude::post($post_data);

        if(config('app.env') === 'local') {
            \Log::channel('lkAmplitude')->info(json_encode($job, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) . PHP_EOL);
        }

        return Amplitude::post($post_data);

    }
}
