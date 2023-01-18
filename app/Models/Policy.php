<?php

namespace App\Models;

use \DateTimeInterface;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\MultiTenantModelTrait;

class Policy extends Model
{
    use SoftDeletes;
    use MultiTenantModelTrait;
    use HasFactory;

    public const COVERAGE_TYPE_SELECT = [
        'named' => 'Named Perils',
        'all'   => 'All-Risk / Open Perils',
    ];

    public const LAYER_SELECT = [
        'primary'    => 'Primary',
        'excess'     => 'Excess Only',
        'standalone' => 'Stand-alone',
    ];

    public const STATUS_SELECT = [
        '1' => 'upcoming',
        '2' => 'active',
        '3' => 'expired',
        '4' => 'lapsed',
        '5' => 'cancelled',
    ];

    public $table = 'policies';

    protected $dates = [
        'start_date',
        'end_date',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'policy_no',
        'insurer_id',
        'policyholder_id',
        'coverage_type',
        'start_date',
        'end_date',
        'status',
        'layer',
        'currency',
        'gross_premium',
        'brokerage_deduction',
        'excess',
        'limit_amount',
        'agent_id',
        'team_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function insurer()
    {
        return $this->belongsTo(Insurer::class, 'insurer_id');
    }

    public function policyholder()
    {
        return $this->belongsTo(Person::class, 'policyholder_id');
    }

    public function getStartDateAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setStartDateAttribute($value)
    {
        $this->attributes['start_date'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getEndDateAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setEndDateAttribute($value)
    {
        $this->attributes['end_date'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function agent()
    {
        return $this->belongsTo(User::class, 'agent_id');
    }

    public function team()
    {
        return $this->belongsTo(Team::class, 'team_id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}