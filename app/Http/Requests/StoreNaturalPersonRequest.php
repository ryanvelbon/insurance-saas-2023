<?php

namespace App\Http\Requests;

use App\Models\NaturalPerson;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreNaturalPersonRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('person_create');
    }

    public function rules()
    {
        return [
            'email' => [
                'email',
                'required',
                'unique:persons'
            ],
            'phone' => [
                'string',
                'required',
                'unique:persons'
            ],
            'firstName' => [
                'string',
                'min:1',
                'max:50',
                'required',
            ],
            'lastName' => [
                'string',
                'min:1',
                'max:50',
                'required',
            ],
            'passportNo' => [
                'string',
                'min:1',
                'max:80',
                'required',
                // 'unique:persons__natural',
            ],
            'maritalStatus' => [
                'string',
                'required',
            ],
        ];
    }
}