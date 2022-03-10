<?php

namespace Modules\User\Http\Requests\User;

use Illuminate\Validation\Rules\Password;
use Illuminate\Validation\Rules\Unique;
use Modules\Core\Http\Requests\BaseFormRequest;
use Modules\User\Models\User;

class StoreUserFormRequest extends BaseFormRequest
{
    /**
     * @return array
     */
    public function rules(): array
    {
        return [
            'firstname' => [
                'required',
                'string',
                'max:255'
            ],
            'lastname' => [
                'required',
                'string',
                'max:255'
            ],
            'username' => [
                'required',
                'string',
                'alpha_dash',
                'max:255',
                new Unique(User::class)
            ],
            'email' => [
                'required',
                'email',
                'max:255',
                new Unique(User::class)
            ],
            'password' => [
                'required',
                Password::min(6),
                'max:255',
                'confirmed'
            ]
        ];
    }
}
