<?php

namespace Modules\My\Jobs;


use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Modules\My\Services\Amplitude;

class AmplitudeJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected mixed $user_id;
    protected string $user_locale = '';
    protected string $event_name = '';
    protected array $attributes = [];

    public function __construct()
    {
        $this->user_id =  \Auth::guard('my')->user()?->email ?? 'unregistered';
        $this->user_locale =  \Auth::guard('my')->user()?->locale ?? 'default';
    }


    public function handle()
    {
        //
    }

    protected function send(array $attributes){

        $post_data = [
            "event_type"       => $this->event_name,
            "user_id"          => $this->user_id,
            'language'         => $this->user_locale,
            'time'             => time(),
            'event_id'         => time(),
            'event_properties' => $attributes
        ];

        \Log::channel('amplitude')->info(json_encode($post_data) . PHP_EOL);

        return Amplitude::post($post_data);
    }
}
