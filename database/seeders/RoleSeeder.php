<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\Permission;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    public function run()
    {
        Role::create([
            'id' => 1,
            'title' => 'Admin',
            'description' => 'Oversees all platform functionalities, configurations, and user management to ensure smooth operations of the SaaS.',
        ])->permissions()->sync(
            Permission::all()
        );


        Role::create([
            'id' => 2,
            'title' => 'User',
            'description' => 'A general user with access to basic features of this software.',
        ])->permissions()->sync(
            Permission::all()->reject(function ($permission) {return preg_match('/^(user|role|permission|team)_/', $permission->title); })
        );


        Role::create([
            'id' => 3,
            'title' => 'Team Leader',
            'description' => 'Supervises and coordinates the activities of a specific team, ensuring efficient workflow and goal attainment.',
        ])->attachPermissions([
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


        Role::create([
            'id' => 5,
            'title' => 'Account Manager',
            'description' => 'Manages client portfolios, ensuring their insurance needs are met and addressing any concerns or changes required in their policies.',
        ]);


        Role::create([
            'id' => 6,
            'title' => 'Underwriter',
            'description' => 'Assesses the risks associated with potential clients or claims and decides on the terms and conditions of insurance policies.',
        ]);


        Role::create([
            'id' => 7,
            'title' => 'Claims Adjuster',
            'description' => 'Evaluates and processes insurance claims, determining the payout amounts and ensuring claims are settled fairly and efficiently.',
        ]);


        Role::create([
            'id' => 8,
            'title' => 'Risk Manager',
            'description' => 'Analyzes potential risks and advises on best insurance policies or preventive measures to mitigate potential threats.',
        ]);
    }
}