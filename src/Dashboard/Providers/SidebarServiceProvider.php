<?php

namespace Modules\Dashboard\Providers;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Modules\Dashboard\Composers\SidebarComposer;
use Modules\Dashboard\Services\Sidebar\Sidebar;

class SidebarServiceProvider extends ServiceProvider implements DeferrableProvider
{
    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(Sidebar::class, function (Application $app) {
            return new Sidebar($app['config']['sidebar']);
        });
        $this->app->bind('sidebar', Sidebar::class);
    }

    /**
     * Boot the application events.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('dashboard::partials.navbar-menu', SidebarComposer::class);
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides(): array
    {
        return [
            Sidebar::class
        ];
    }
}
