<?php

namespace Modules\User\Http\Requests\Auth;

use Modules\Core\Http\Requests\BaseFormRequest;

class LoginFormRequest extends BaseFormRequest
{
    /**
     * @return string[][]
     */
    public function rules(): array
    {
        return [
            'account' => [
                'required',
                'max:255'
            ],
            'password' => [
                'required',
                'max:255'
            ],
            'remember' => 'boolean'
        ];
    }
}
