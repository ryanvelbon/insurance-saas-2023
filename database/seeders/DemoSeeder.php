<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DemoSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            UsersTableSeeder::class,
            InsurersTableSeeder::class,
            PoliciesTableSeeder::class,
        ]);
    }
}
