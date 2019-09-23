<?php

namespace App\Providers;

use Carbon\Carbon;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register() {
        //

        Carbon::setLocale('zh');
        \Spatie\Flash\Flash::levels([
            'success' => 'success',
            'warning' => 'warning',
            'info' => 'info',
            'danger' => 'error',
        ]);
        if (config('app.debug')) {
            $this->app->register(\Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider::class);
            $this->app->register('VIACreative\SudoSu\ServiceProvider');
        }

    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot() {
        //
    }
}
