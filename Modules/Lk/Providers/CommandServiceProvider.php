<?php

namespace Modules\Lk\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\Lk\Console\Db;
use Modules\Lk\Console\Log;
use Modules\Lk\Console\SeedUsers;
use Modules\Lk\Console\StoreLocales;


class CommandServiceProvider extends ServiceProvider
{

    public function boot(): void
    {
        $this->commands(
            [
                SeedUsers::class,
                StoreLocales::class,
                Db::class,
                Log::class
            ]
        );
    }

}
