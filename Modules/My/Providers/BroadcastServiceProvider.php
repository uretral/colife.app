<?php

namespace Modules\My\Providers;

use Illuminate\Support\Facades\Broadcast;
use Illuminate\Support\ServiceProvider;

class BroadcastServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $attributes = ['middleware' => ['my']];
        Broadcast::routes($attributes);

        require module_path('My', '/Routes/channels.php');
    }
}
