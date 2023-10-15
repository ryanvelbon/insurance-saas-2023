<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PolicyIndexResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'policy_no' => $this->policy_no,
            'coverage_type' => $this->coverage_type,
            'start_date' => $this->start_date,
            'end_date' => $this->end_date,
            'status' => $this->status,
            'layer' => $this->layer,
            'currency' => $this->currency,
            'gross_premium' => $this->gross_premium,
            'brokerage_deduction' => $this->brokerage_deduction,
            'excess' => $this->excess,
            'limit_amount' => $this->limit_amount,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'deleted_at' => $this->deleted_at,

            'category' => $this->category, // this returns an InsuranceCategory object

            'agent' => [
                'id' => $this->agent->id,
                'name' => $this->agent->name,
            ],

            'insurer' => [
                'id' => $this->insurer->id,
                'name' => $this->insurer->name,
            ],

            'policyholder' => [
                'id' => $this->policyholder->id,
                'name' => $this->policyholder->name,
            ],
        ];
    }
}
