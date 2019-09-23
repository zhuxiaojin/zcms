<?php

namespace App\Providers;

use App\Models\Article;
use App\Models\Manager;
use App\Models\Menu;
use App\Models\Site;
use App\Observers\ArticleObserver;
use App\Observers\ManagerObserver;
use App\Observers\MenuObserver;
use App\Observers\PermissionObserver;
use App\Observers\SiteObserver;
use Illuminate\Support\Facades\Event;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Spatie\Permission\Models\Permission;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot() {
        parent::boot();
        Manager::observe(ManagerObserver::class);
        Site::observe(SiteObserver::class);
        Menu::observe(MenuObserver::class);
        Permission::observe(PermissionObserver::class);
        Article::observe(ArticleObserver::class);
        //
    }
}
