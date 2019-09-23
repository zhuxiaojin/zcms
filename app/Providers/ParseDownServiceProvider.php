<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class ParseDownServiceProvider extends ServiceProvider
{
//    protected $defer = true;

    /**
     * Register services.
     *
     * @return void
     */
    public function register() {
        //
        $this->app->singleton('ParseDown', function () {
            return new \Parsedown;
        });
    }
    public function provides()
    {
        return ['ParseDown'];
    }
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot() {
        //
    }
}
