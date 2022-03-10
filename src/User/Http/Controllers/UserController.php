<?php

namespace Modules\User\Http\Controllers;

use Illuminate\Contracts\Hashing\Hasher;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Modules\Dashboard\Services\Toast\Toaster;
use Modules\User\Http\Requests\User\StoreUserFormRequest;
use Modules\User\Http\Requests\User\UpdateUserFormRequest;
use Modules\User\Repositories\UserRepository;

class UserController extends BaseController
{
    /**
     * @var UserRepository
     */
    protected $userRepository;

    /**
     * @var Toaster
     */
    protected $toaster;

    /**
     * @param UserRepository $userRepository
     * @param Toaster $toaster
     */
    public function __construct(
        UserRepository $userRepository,
        Toaster $toaster
    ) {
        parent::__construct();

        $this->userRepository = $userRepository;
        $this->toaster = $toaster;

        $this->page->setHeaderPreTitle(__('Users'));
    }

    /**
     * @return Renderable
     */
    public function index(): Renderable
    {
        $this->page->setTitle(__('User List'))
            ->setHeaderTitle(__('User List'));

        $users = $this->userRepository->paginate();

        return $this->respondView('user::users.index', compact('users'));
    }

    /**
     * @return Renderable
     */
    public function create(): Renderable
    {
        $this->page->setTitle(__('Create user'))
            ->setHeaderTitle(__('Create user'));

        return $this->respondView('user::users.create');
    }

    /**
     * @param StoreUserFormRequest $request
     * @param Hasher $hash
     * @return RedirectResponse
     */
    public function store(StoreUserFormRequest $request, Hasher $hash): RedirectResponse
    {
        $attributes = $request->validated();
        $attributes['password'] = $hash->make($attributes['password']);

        $user = $this->userRepository->create($attributes);

        $this->toaster->success(__('User ":username" created', [
            'username' => $user->username
        ]));

        if ($request->has('continue')) {
            return $this->redirectToRoute('users.edit', compact('user'));
        }

        return $this->redirectToRoute('users.index');
    }

    /**
     * @param int $id
     * @return Renderable
     */
    public function edit(int $id): Renderable
    {
        $this->page->setTitle(__('Edit user'))
            ->setHeaderTitle(__('Edit user'));

        $user = $this->userRepository->find($id);

        return $this->respondView('user::users.edit', compact('user'));
    }

    /**
     * @param int $id
     * @param UpdateUserFormRequest $request
     * @param Hasher $hash
     * @return RedirectResponse
     */
    public function update(
        int $id,
        UpdateUserFormRequest $request,
        Hasher $hash
    ): RedirectResponse {
        $user = $this->userRepository->find($id);

        $attributes = Arr::except($request->validated(), [
            'password'
        ]);

        if ($request->filled('password')) {
            $attributes['password'] = $hash->make($request->input('password'));
        }

        $user = $this->userRepository->update($attributes, $user->id);

        $this->toaster->success(__('User ":username" updated', [
            'username' => $user->username
        ]));

        if ($request->has('continue')) {
            return $this->redirectToRoute('users.edit', compact('user'));
        }

        return $this->redirectToRoute('users.index');
    }

    /**
     * @param int $id
     * @param Request $request
     * @return RedirectResponse
     */
    public function destroy(int $id, Request $request): RedirectResponse
    {
        $user = $this->userRepository->find($id);

        if ($request->user()->id != $user->id) {
            $this->userRepository->delete($user->id);

            $this->toaster->success(__('User ":username" deleted', [
                'username' => $user->username
            ]));
        } else {
            $this->toaster->error(__('Cannot deleted ":username"', [
                'username' => $user->username
            ]));
        }

        return $this->redirectToRoute('users.index');
    }
}
