<?php

namespace Database\Seeders;

use App\Enums\RoleTitle;
use App\Models\Team;
use App\Models\User;
use App\Models\Role;
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
        $admin = User::create([
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

            $users = User::factory()
                        ->count(5)
                        ->create(['team_id' => $team->id]);

            foreach ($users as $user) {
                $user->assignRole(RoleTitle::SALES_AGENT);
            }

            $team->owner_id = $users[0]->id;
            $team->save();
        }
    }
}