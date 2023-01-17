<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use App\Models\Team;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([

            CountriesTableSeeder::class,

            PermissionsTableSeeder::class,
            RolesTableSeeder::class,
            UsersTableSeeder::class,
            RoleUserTableSeeder::class,
            
        ]);

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
        $admin = User::find(1); $admin->team_id = 2; $admin->save();
    }
}
