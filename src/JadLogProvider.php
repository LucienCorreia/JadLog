<?php

namespace JadLog;

use Illuminate\Support\ServiceProvider;

class JadLogProvider extends ServiceProvider {

    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot() {
        $this->publishes([
            __DIR__ . '/config/jadlog.php' => config_path('jadlog.php'),
        ]);
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register() {
        
    }
}
