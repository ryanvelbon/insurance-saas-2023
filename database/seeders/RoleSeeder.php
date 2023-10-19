<?php

namespace Database\Seeders;

use App\Enums\RoleTitle;
use App\Models\Role;
use App\Models\Permission;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    public function run()
    {
        Role::create([
            'id' => 1,
            'title' => RoleTitle::ADMIN,
            'description' => 'Oversees all platform functionalities, configurations, and user management to ensure smooth operations of the SaaS.',
        ])->permissions()->sync(
            Permission::all()
        );


        Role::create([
            'id' => 3,
            'title' => RoleTitle::TEAM_LEADER,
            'description' => 'Supervises and coordinates the activities of a specific team, ensuring efficient workflow and goal attainment.',
        ]);


        $role = Role::create([
            'id' => 4,
            'title' => RoleTitle::SALES_AGENT,
            'description' => 'Engages with potential clients to sell insurance policies and manages existing client relations for policy renewals.',
        ]);


        Role::create([
            'id' => 5,
            'title' => RoleTitle::ACCOUNT_MANAGER,
            'description' => 'Manages client portfolios, ensuring their insurance needs are met and addressing any concerns or changes required in their policies.',
        ]);


        Role::create([
            'id' => 6,
            'title' => RoleTitle::UNDERWRITER,
            'description' => 'Assesses the risks associated with potential clients or claims and decides on the terms and conditions of insurance policies.',
        ]);


        Role::create([
            'id' => 7,
            'title' => RoleTitle::CLAIMS_ADJUSTER,
            'description' => 'Evaluates and processes insurance claims, determining the payout amounts and ensuring claims are settled fairly and efficiently.',
        ]);


        Role::create([
            'id' => 8,
            'title' => RoleTitle::RISK_MANAGER,
            'description' => 'Analyzes potential risks and advises on best insurance policies or preventive measures to mitigate potential threats.',
        ]);
    }
}