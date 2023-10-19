<?php

namespace App\Http\Requests;

use Gate;
use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
{
    public function authorize()
    {
        return true; // *TEMP*

        return Gate::allows('user.create');
    }

    public function rules()
    {
        // *PENDING* use same validation as RegisteredUserController.php

        return [
            'name' => [
                'string',
                'min:3',
                'max:40',
                'required',
            ],
            'email' => [
                'required',
                'unique:users',
            ],
            'password' => [
                'min:8',
                'required',
            ],
            'roles.*' => [
                'integer',
            ],
            'roles' => [
                'array',
            ],
        ];
    }
}
