<?php

namespace Modules\Lk\Providers;

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
        $attributes = ['middleware' => ['lk']];
        Broadcast::routes($attributes);

        require module_path('Lk', '/Routes/channels.php');
    }
}
