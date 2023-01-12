<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class JuridicalPerson extends Model
{
    use SoftDeletes;
    use HasFactory;

    public const TYPE_SELECT = [
        [    
            'label' => 'corporation',
            'value' => 'corp',
        ],
        [    
            'label' => 'government',
            'value' => 'gov',
        ],
        [    
            'label' => 'non-profit',
            'value' => 'non-profit',
        ],
    ];

    public const STATUS_SELECT = [
        [    
            'label' => 'active',
            'value' => 'active',
        ],
        [    
            'label' => 'liquidated',
            'value' => 'liquidated',
        ],
        [    
            'label' => 'dissolved',
            'value' => 'dissolved',
        ],
        [    
            'label' => 'defunct',
            'value' => 'defunct',
        ],
    ];

    public const SIZE_SELECT = [
        [    
            'label' => '< 10',
            'value' => '1',
        ],
        [    
            'label' => '10 to 49',
            'value' => '2',
        ],
        [    
            'label' => '50 to 99',
            'value' => '3',
        ],
        [    
            'label' => '100 to 249',
            'value' => '4',
        ],
        [    
            'label' => '250 to 499',
            'value' => '5',
        ],
        [    
            'label' => '500+',
            'value' => '6',
        ],
    ];

    public $table = 'persons__juridical';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'name',
        'description',
        'type',
        'size',
        'founded',
        'status',
        'website',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}