<?php

namespace Modules\User\Http\Controllers\Auth;

use Illuminate\Auth\AuthManager;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\RedirectResponse;
use Illuminate\Validation\ValidationException;
use Modules\User\Http\Controllers\BaseController;
use Modules\User\Http\Requests\Auth\LoginFormRequest;

class LoginController extends BaseController
{
    /**
     * @return Renderable
     */
    public function show(): Renderable
    {
        $this->page->setTitle('Login');

        return $this->respondView('user::auth.login');
    }

    /**
     * @param LoginFormRequest $request
     * @param AuthManager $auth
     * @return RedirectResponse
     * @throws ValidationException
     */
    public function login(LoginFormRequest $request, AuthManager $auth): RedirectResponse
    {
        $isLogged = $auth->guard('dashboard')->attempt([
            'username' => $request->input('account'),
            'password' => $request->input('password'),
        ]);

        if (!$isLogged) {
            throw ValidationException::withMessages([
                'account' => [trans('auth.failed')]
            ]);
        }

        return $this->redirectToRoute('dashboard.show');
    }

    /**
     * @param AuthManager $auth
     * @return RedirectResponse
     */
    public function logout(AuthManager $auth): RedirectResponse
    {
        $auth->guard('dashboard')->logout();

        return $this->redirectToRoute('login.show');
    }
}
