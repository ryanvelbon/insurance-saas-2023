<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\Permission;
use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    public function run()
    {
        $role = Role::create([
            'id' => 1,
            'title' => 'Admin',
            'description' => 'Oversees all platform functionalities, configurations, and user management to ensure smooth operations of the SaaS.',
        ]);
        $permissions = Permission::all();
        $role->permissions()->sync($permissions->pluck('id'));


        $role = Role::create([
            'id' => 2,
            'title' => 'User',
            'description' => 'A general user with access to basic features of this software.',
        ]);
        $permissions = Permission::all()->reject(function ($permission) {return preg_match('/^(user|role|permission|team)_/', $permission->title); });
        $role->permissions()->sync($permissions);


        $role = Role::create([
            'id' => 3,
            'title' => 'Team Leader',
            'description' => 'Supervises and coordinates the activities of a specific team, ensuring efficient workflow and goal attainment.',
        ]);
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


        $role = Role::create([
            'id' => 4,
            'title' => 'Sales Agent',
            'description' => 'Engages with potential clients to sell insurance policies and manages existing client relations for policy renewals.',
        ]);
        $permissions = Permission::all()->filter(function ($permission) {return preg_match('/^(person|policy)_/', $permission->title); });
        $role->permissions()->sync($permissions);
        $role->attachPermissions([
            'team_access',
            'team_show'
        ]);

        $role = Role::create([
            'id' => 5,
            'title' => 'Account Manager',
            'description' => 'Manages client portfolios, ensuring their insurance needs are met and addressing any concerns or changes required in their policies.',
        ]);

        $role = Role::create([
            'id' => 6,
            'title' => 'Underwriter',
            'description' => 'Assesses the risks associated with potential clients or claims and decides on the terms and conditions of insurance policies.',
        ]);

        $role = Role::create([
            'id' => 7,
            'title' => 'Claims Adjuster',
            'description' => 'Evaluates and processes insurance claims, determining the payout amounts and ensuring claims are settled fairly and efficiently.',
        ]);

        $role = Role::create([
            'id' => 8,
            'title' => 'Risk Manager',
            'description' => 'Analyzes potential risks and advises on best insurance policies or preventive measures to mitigate potential threats.',
        ]);
    }
}