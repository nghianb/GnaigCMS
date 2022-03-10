<?php

namespace Modules\User\Http\Controllers\Auth;

use Illuminate\Contracts\Hashing\Hasher;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Modules\Dashboard\Services\Toast\Toaster;
use Modules\User\Http\Controllers\BaseController;
use Modules\User\Http\Requests\Auth\UpdateMeFormRequest;
use Modules\User\Repositories\UserRepository;

class MeController extends BaseController
{
    /**
     * @var UserRepository
     */
    protected $userRepository;

    /**
     * @param UserRepository $userRepository
     */
    public function __construct(UserRepository $userRepository)
    {
        parent::__construct();

        $this->userRepository = $userRepository;
    }

    /**
     * @param Request $request
     * @return Renderable
     */
    public function show(Request $request): Renderable
    {
        $this->page->setTitle(__('Profile'))
            ->setHeaderTitle(__('Profile'))
            ->setHeaderPreTitle(__('Me'));

        $user = $request->user();

        return $this->respondView('user::auth.me', compact('user'));
    }

    /**
     * @param UpdateMeFormRequest $request
     * @param Hasher $hash
     * @param Toaster $toaster
     * @return RedirectResponse
     */
    public function update(
        UpdateMeFormRequest $request,
        Hasher $hash,
        Toaster $toaster
    ): RedirectResponse
    {
        $user = $request->user();

        $attributes = Arr::except($request->validated(), [
            'password'
        ]);

        if ($request->filled('password')) {
            $attributes['password'] = $hash->make($request->input('password'));
        }

        $this->userRepository->update($attributes, $user->id);

        $toaster->success(__('Profile updated'));

        return $this->redirectToRoute('me.show');
    }
}
