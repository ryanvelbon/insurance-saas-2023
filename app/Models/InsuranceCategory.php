<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class InsuranceCategory extends Model
{
    public $timestamps = false;

    public function policies(): HasMany
    {
        return $this->hasMany(Policy::class, 'category_id');
    }
}
