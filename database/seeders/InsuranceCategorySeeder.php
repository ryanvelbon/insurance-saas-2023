<?php

namespace Database\Seeders;

use App\Models\InsuranceCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class InsuranceCategorySeeder extends Seeder
{
    public function run()
    {
        $categories = [
            [
                'title' => 'Boat',
                'slug' => 'boat',
                'icon' => 'sailboat',
            ],
            [
                'title' => 'Health',
                'slug' => 'health',
                'icon' => 'suitcase-medical',
            ],
            [
                'title' => 'Home',
                'slug' => 'home',
                'icon' => 'house',
            ],
            [
                'title' => 'Life',
                'slug' => 'life',
                'icon' => 'tombstone-blank', // skull, coffin
            ],
            [
                'title' => 'Motor',
                'slug' => 'motor',
                'icon' => 'car',
            ],
            [
                'title' => 'Travel',
                'slug' => 'travel',
                'icon' => 'plane',
            ],
        ];

        foreach ($categories as $category) {
            InsuranceCategory::create($category);
        }
    }
}
