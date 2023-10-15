<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InsuranceCategory extends Model
{
    public $timestamps = false;

    public function policies()
    {
        return $this->hasMany(Policy::class, 'category_id');
    }
}
