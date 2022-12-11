<?php

namespace Dhruva81\Razor;

use Illuminate\Support\ServiceProvider;

class RazorServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/razor.php', 'razor');
    }

    public function boot()
    {
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'razor');

        $this->publishes([
            __DIR__.'/../resources/views' => resource_path('views/vendor/razor'),
        ]);

        $this->publishes([
            __DIR__.'/../config/razor.php' => config_path('razor.php'),
        ]);
    }
}
