<?php

namespace App\Models;

use \DateTimeInterface;
use App\Traits\MultiTenantModelTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Person extends Model
{
    use SoftDeletes;
    use MultiTenantModelTrait;
    use HasFactory;

    public const TYPE_NATURAL = 1;
    public const TYPE_JURIDICAL = 2;

    public const TYPE_SELECT = [
        self::TYPE_NATURAL   => 'natural',
        self::TYPE_JURIDICAL => 'juridical',
    ];

    public $table = 'persons';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $appends = ['name'];

    protected $fillable = [
        'email',
        'phone',
        'type',
        'team_id',
        'domicile_country_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function team()
    {
        return $this->belongsTo(Team::class, 'team_id');
    }

    public function domicile()
    {
        return $this->belongsTo(Country::class, 'domicile_country_id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function scopeNatural($query)
    {
        return $query->where('type', self::TYPE_NATURAL);
    }

    public function scopeJuridical($query)
    {
        return $query->where('type', self::TYPE_JURIDICAL);
    }

    public function getNameAttribute()
    {
        if ($this->type === self::TYPE_NATURAL) {
            return $this->profile->fullName;
        } else if ($this->type === self::TYPE_JURIDICAL) {
            return $this->profile->name;
        } else {
            return null;
        }
    }

    public function getProfileAttribute()
    {
        if ($this->type === self::TYPE_NATURAL) {
            return NaturalPerson::where('person_id', $this->id)->first();
        } else if ($this->type === self::TYPE_JURIDICAL) {
            return JuridicalPerson::where('person_id', $this->id)->first();
        } else {
            return null;
        }
    }
}