<?php

namespace Twyco\ImageSystem;

use Illuminate\Support\ServiceProvider;

class ImageSystemServiceProvider
{
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__ . '/../routes/api.php');
        $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');
        $this->publishes([
            __DIR__ . '/../config/image-system.php' => config_path('image-system.php'),
        ], 'config');
    }

    public function register()
    {
        //
    }
}