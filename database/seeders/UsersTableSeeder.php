<?php

namespace Database\Seeders;

use App\Models\Team;
use App\Models\User;
use App\Models\Role;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        // +++ create admin user +++

        $admin = User::create([
            'id'             => 1,
            'name'           => 'Admin',
            'email'          => 'admin@x.com',
            'password'       => bcrypt('password'),
            'remember_token' => null,
        ]);

        $admin->roles()->sync(1);

        // +++ create end-users +++

        foreach (['Team A', 'Team B'] as $teamName) {

            $team = Team::create(['name' => $teamName]);

            $users = User::factory()
                        ->count(3)
                        ->create(['team_id' => $team->id]);

            // assign Sales Agent role
            foreach ($users as $user) {
                $user->roles()->sync(Role::where('title', 'Sales Agent')->first()->id);
            }

            $team->owner_id = $users[0]->id;
            $team->save();
        }

        // *TEMP* adds admin to Team B
        $admin->team_id = 2;
        $admin->save();
    }
}