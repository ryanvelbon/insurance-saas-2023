<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Role extends Model
{
    use SoftDeletes;
    use HasFactory;

    public $table = 'roles';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'title',
        'description',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function permissions()
    {
        return $this->belongsToMany(Permission::class);
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    /**
     * attaches permissions by title
     */
    public function attachPermissions(Array $permissionTitles)
    {
        $permissions = collect([]);

        foreach ($permissionTitles as $title) {
            $permission = Permission::where('title', $title)->first();
            if ($permission) {
                $permissions->push($permission);
            }
        }

        $this->permissions()->syncWithoutDetaching($permissions->pluck('id'));
    }
}