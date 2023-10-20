<?php

namespace App\Http\Requests;

use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateUserRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('user.create');
    }

    public function rules()
    {
        return [
            'name' => [
                'required',
                'string',
                'min:3',
                'max:40',
            ],
            'email' => [
                'required',
                Rule::unique('users')->ignore($this->user),
            ],
            'password' => [
                'nullable',
                'min:8',
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
