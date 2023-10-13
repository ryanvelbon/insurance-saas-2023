<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class NaturalPerson extends Model
{
    use SoftDeletes;

    public const GENDER_MALE   = 1;
    public const GENDER_FEMALE = 0;

    public const GENDER_SELECT = [
        [
            'label' => 'Male',
            'value' => self::GENDER_MALE,
        ],
        [
            'label' => 'Female',
            'value' => self::GENDER_FEMALE,
        ],
    ];

    public const MARITAL_STATUS_SELECT = [
        [
            'label' => 'single',
            'value' => 'single',
        ],
        [
            'label' => 'married',
            'value' => 'married',
        ],
        [
            'label' => 'divorced',
            'value' => 'divorced',
        ],
        [
            'label' => 'widowed',
            'value' => 'widowed',
        ],
        [
            'label' => 'separated',
            'value' => 'separated',
        ],
    ];

    public $table = 'persons__natural';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'person_id',
        'passport_no',
        'first_name',
        'last_name',
        'nationality',
        'gender',
        'dob',
        'marital_status',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function getFullNameAttribute()
    {
        return $this->first_name . ' ' . $this->last_name;
    }
}