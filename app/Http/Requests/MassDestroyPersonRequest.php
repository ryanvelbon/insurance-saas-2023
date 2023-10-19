<?php

namespace App\Http\Requests;

use App\Models\Person;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyPersonRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('person.delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:persons,id',
        ];
    }
}