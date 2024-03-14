<?php

namespace Modules\My\Providers;

use Modules\My\Console\MyStoreLocales;

class CommandServiceProvider extends \Illuminate\Support\ServiceProvider
{
    public function boot(): void
    {
        $this->commands(
            [
                MyStoreLocales::class
            ]
        );
    }
}
