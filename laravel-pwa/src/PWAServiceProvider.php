<?php

namespace Lewis\LaravelPwa;

use Illuminate\Support\ServiceProvider;
use Lewis\LaravelPwa\Commands\SearchCommand;

class PWAServiceProvider extends ServiceProvider
{
    public function boot()
    {
    }

    public function register()
    {
        $this->app->singleton(Weather::class, function() {
            return new Weather();
        });

        $this->commands([
            SearchCommand::class
        ]);
    }
}
