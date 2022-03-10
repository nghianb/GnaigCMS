<?php

namespace Modules\User\Providers;

use Illuminate\Routing\Router;
use Illuminate\Support\ServiceProvider;
use Modules\User\Http\Middleware\Authenticate;
use Modules\User\Http\Middleware\RedirectIfAuthenticated;
use Illuminate\Contracts\Container\BindingResolutionException;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * Boot the application events.
     *
     * @return void
     * @throws BindingResolutionException
     */
    public function register()
    {
        $router = $this->app->make(Router::class);
        $router->aliasMiddleware('auth', Authenticate::class);
        $router->aliasMiddleware('guest', RedirectIfAuthenticated::class);
    }
}
