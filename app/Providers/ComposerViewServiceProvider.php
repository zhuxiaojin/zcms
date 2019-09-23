<?php

namespace App\Providers;

use App\Http\ViewComposers\MenuComposer;
use App\Http\ViewComposers\NotificationsComposer;
use App\Http\ViewComposers\RolesComposer;
use App\Http\ViewComposers\SiteComposer;
use Illuminate\Support\ServiceProvider;

class ComposerViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register() {

    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot() {
        //绑定通用视图
        \View::composer(['admin.manager.create', 'admin.manager.edit'], RolesComposer::class);
        \View::composer(['layouts.admin.app', 'admin.login.login_form', 'layouts.home.app'], SiteComposer::class);
        \View::composer(['layouts.admin.menu'], MenuComposer::class);
        \View::composer(['layouts.admin.top'], NotificationsComposer::class);
    }
}
