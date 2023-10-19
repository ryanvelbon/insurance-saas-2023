<?php

namespace App\Http\Requests;

use App\Models\JuridicalPerson;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreJuridicalPersonRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('person.create');
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
            'name' => [
                'string',
                'min:1',
                'max:80',
                'required',
                'unique:persons__juridical',
            ],
            'description' => [
                'string',
                'min:0',
                'max:200',
                'nullable',
            ],
            'founded' => [
                'nullable',
                'integer',
                'min:1800',
                'max:2100',
            ],
            'website' => [
                'string',
                'min:5',
                'max:150',
                'nullable',
            ],
        ];
    }
}