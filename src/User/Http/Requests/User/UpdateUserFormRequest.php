<?php

namespace Modules\User\Http\Requests\User;

use Illuminate\Validation\Rules\Password;
use Illuminate\Validation\Rules\Unique;
use Modules\Core\Http\Requests\BaseFormRequest;
use Modules\User\Models\User;

class UpdateUserFormRequest extends BaseFormRequest
{
    /**
     * @return array
     */
    public function rules(): array
    {
        return [
            'firstname' => [
                'string',
                'max:255'
            ],
            'lastname' => [
                'string',
                'max:255'
            ],
            'username' => [
                'string',
                'alpha_dash',
                'max:255',
                (new Unique(User::class))
                    ->ignore($this->route('user'))
            ],
            'email' => [
                'string',
                'email',
                'max:255',
                (new Unique(User::class))
                    ->ignore($this->route('user'))
            ],
            'password' => [
                'nullable',
                Password::min(6),
                'max:255',
                'confirmed'
            ]
        ];
    }
}
