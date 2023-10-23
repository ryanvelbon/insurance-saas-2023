<?php

namespace Database\Seeders;

use App\Enums\RoleTitle;
use App\Models\Team;
use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $this->createAdmin();
        $this->createEndUsers();
    }

    public function createAdmin()
    {
        $admin = User::factory()->create([
            'id'             => 1,
            'name'           => 'Admin',
            'email'          => 'admin@x.com',
            'password'       => bcrypt('password'),
            'remember_token' => null,
        ]);

        $admin->assignRole(RoleTitle::ADMIN);
    }

    public function createEndUsers()
    {
        foreach (['Team A', 'Team B', 'Team C', 'Team D'] as $teamName) {

            $team = Team::create(['name' => $teamName]);

            // Create owner
            $owner = User::factory()->create(['team_id' => $team->id]);
            $owner->assignRole(RoleTitle::TEAM_LEADER);
            $team->owner_id = $owner->id;
            $team->save();

            // Create other users
            User::factory()
                ->count(5)
                ->create(['team_id' => $team->id])
                ->each(fn($user) => $user->assignRole(RoleTitle::SALES_AGENT));

            User::factory()
                ->count(2)
                ->create(['team_id' => $team->id])
                ->each(fn($user) => $user->assignRole(RoleTitle::UNDERWRITER));

            User::factory()
                ->count(1)
                ->create(['team_id' => $team->id])
                ->each(fn($user) => $user->assignRole(RoleTitle::CLAIMS_ADJUSTER));

            User::factory()
                ->count(1)
                ->create(['team_id' => $team->id])
                ->each(fn($user) => $user->assignRole(RoleTitle::RISK_MANAGER));
        }
    }
}