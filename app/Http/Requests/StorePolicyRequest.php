<?php

namespace App\Http\Requests;

use Gate;
use Illuminate\Foundation\Http\FormRequest;

class StorePolicyRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('policy.create');
    }

    public function rules()
    {
        return [
            'category_id' => 'required|exists:insurance_categories,id',
            'policy_no' => 'required|string|max:255|unique:policies',
            'coverage_type' => 'required|string|max:255',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'status' => 'nullable|string|max:255',
            'layer' => 'nullable|string|max:255',
            'currency' => 'required|string|max:3',
            'gross_premium' => 'required|numeric|min:0',
            'brokerage_deduction' => 'nullable|numeric|min:0',
            'excess' => 'required|numeric|min:0',
            'limit_amount' => 'required|numeric|min:0',
            'insurer_id' => 'required|exists:insurers,id',
            'policyholder_id' => 'required|exists:persons,id',
            'agent_id' => 'required|exists:users,id',
        ];
    }
}
