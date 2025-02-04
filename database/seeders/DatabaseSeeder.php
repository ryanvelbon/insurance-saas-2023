<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use App\Models\Team;
use App\Models\Insurer;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            CountrySeeder::class,
            InsuranceCategorySeeder::class,
            PermissionSeeder::class,
            RoleSeeder::class,
        ]);
    }
}
