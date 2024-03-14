<?php

namespace Modules\My\Providers;

use App\Models\Locales;
use Illuminate\Support\ServiceProvider;
use \Illuminate\Support\Facades\View;



class LocaleServiceProvider extends ServiceProvider
{

    public function boot(): void
    {
        $this->locale();
    }


    public function locale()
    {
        View::composer('*', function ($view){
            $view->with(['userAvatar' => \auth()->user()?->avatar]);
            if(\auth()->check() && \auth()->user()->locale) {
                $this->app->setLocale(\auth()->user()->locale);
            }
        });
    }

}
