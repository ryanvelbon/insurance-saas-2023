<?php

namespace App\Models;

use App\Enums\RoleTitle;
// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;

    protected $fillable = [
        'name',
        'email',
        'password',
        'last_login_at',
        'last_login_ip',
        'team_id',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function roles(): BelongsToMany
    {
        return $this->belongsToMany(Role::class);
    }

    public function team(): BelongsTo
    {
        return $this->belongsTo(Team::class, 'team_id');
    }

    public function assignRole(RoleTitle $role)
    {
        return $this->roles()->syncWithoutDetaching(Role::where('title', $role->value)->first()->id);
    }

    public function removeRole(RoleTitle $role)
    {
        return $this->roles()->detach(Role::where('title', $role->value)->first()->id);
    }

    public function hasRole(RoleTitle $role): bool
    {
        return $this->roles()->where('title', $role->value)->exists();
    }

    public function isAdmin(): bool
    {
        return $this->hasRole(RoleTitle::ADMIN);
    }

    public function isTeamLeader(): bool
    {
        return $this->hasRole(RoleTitle::TEAM_LEADER);
    }

    public function isSalesAgent(): bool
    {
        return $this->hasRole(RoleTitle::SALES_AGENT);
    }

    public function isAccountManager(): bool
    {
        return $this->hasRole(RoleTitle::ACCOUNT_MANAGER);
    }

    public function isUnderwriter(): bool
    {
        return $this->hasRole(RoleTitle::UNDERWRITER);
    }

    public function isClaimsAdjuster(): bool
    {
        return $this->hasRole(RoleTitle::CLAIMS_ADJUSTER);
    }

    public function isRiskManager(): bool
    {
        return $this->hasRole(RoleTitle::RISK_MANAGER);
    }

    public function permissions(): array
    {
        return $this->roles()->with('permissions')->get()
            ->map(function ($role) {
                return $role->permissions->pluck('title');
            })->flatten()->values()->unique()->toArray();
    }

    public function hasPermission(string $permission): bool
    {
        return in_array($permission, $this->permissions(), true);
    }
}
