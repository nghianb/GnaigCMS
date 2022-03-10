<?php

namespace Modules\User\Http\Middleware;

use App\Http\Middleware\Authenticate as BaseAuthenticate;
use function route;

class Authenticate extends BaseAuthenticate
{
    protected function redirectTo($request): string
    {
        if (! $request->expectsJson()) {
            return route('login.show');
        }

        return '';
    }
}
