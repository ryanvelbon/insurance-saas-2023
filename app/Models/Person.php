<?php

namespace App\Models;

use \DateTimeInterface;
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

    protected $fillable = [
        'email',
        'phone',
        'type',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}