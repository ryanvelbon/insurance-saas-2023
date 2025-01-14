<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

/**
 * Enable multi-tenancy for Eloquent models by automatically setting the `team_id`
 * and `created_by` attributes for records.
 */
trait MultiTenantModelTrait
{
    public static function bootMultiTenantModelTrait()
    {
        if (!app()->runningInConsole() && auth()->check()) {
            $isAdmin = auth()->user()->roles->contains(1);
            static::creating(function ($model) use ($isAdmin) {
                // Prevent admin from setting his own id - admin entries are global.
                // If required, remove the surrounding IF condition and admins will act as users
                if (!$isAdmin) {
                    $model->team_id = auth()->user()->team_id;
                    $model->created_by = auth()->user()->id;
                }
            });
            if (!$isAdmin) {
                static::addGlobalScope('team_id', function (Builder $builder) {
                    $field = sprintf('%s.%s', $builder->getQuery()->from, 'team_id');

                    $builder->where($field, auth()->user()->team_id)->orWhereNull($field);
                });
            }
        }
    }
}