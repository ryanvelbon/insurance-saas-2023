<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\Permission;
use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    public function run()
    {
        $role = Role::create(['id' => 1, 'title' => 'Admin']);
        $permissions = Permission::all();
        $role->permissions()->sync($permissions->pluck('id'));


        $role = Role::create(['id' => 2, 'title' => 'User']);
        $permissions = Permission::all()->reject(function ($permission) {return preg_match('/^(user|role|permission|team)_/', $permission->title); });
        $role->permissions()->sync($permissions);


        $role = Role::create(['id' => 3, 'title' => 'Team Leader']);
        $role->attachPermissions([
            'profile_password_edit',
            'person_create',
            'person_edit',
            'person_show',
            'person_delete',
            'person_access',
            'team_create',
            'team_edit',
            'team_show',
            'team_delete',
            'team_access',
        ]);


        $role = Role::create(['id' => 4, 'title' => 'Sales Agent']);
        $permissions = Permission::all()->filter(function ($permission) {return preg_match('/^(person|policy)_/', $permission->title); });
        $role->permissions()->sync($permissions);
        $role->attachPermissions([
            'team_access',
            'team_show'
        ]);

    }
}