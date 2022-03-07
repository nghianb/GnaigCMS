<?php

namespace Modules\Dashboard\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Modules\Dashboard\Composers\ToastComposer;
use Modules\Dashboard\Services\Toast\Toaster;

class ToastServiceProvider extends ServiceProvider
{
    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(Toaster::class, Toaster::class);
        $this->app->bind('toast.container', Toaster::class);
    }

    /**
     * Boot the application events.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('dashboard::partials.toast', ToastComposer::class);
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides(): array
    {
        return [
            Toaster::class
        ];
    }
}
