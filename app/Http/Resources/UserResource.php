<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'last_login_at' => $this->last_login_at,
            'created_at' => $this->created_at,
            'team_id' => $this->team_id,
            'roles' => $this->roles->map(function ($role) {
                return [
                    'id' => $role->id,
                    'title' => $role->title,
                ];
            }),
        ];
    }
}
