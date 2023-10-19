<?php

namespace Database\Seeders;

use App\Models\Insurer;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class InsurerSeeder extends Seeder
{
    public function run()
    {
        Insurer::factory(10)->create();
    }
}
