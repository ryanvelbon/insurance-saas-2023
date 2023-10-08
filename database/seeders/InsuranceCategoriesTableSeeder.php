<?php

namespace Database\Seeders;

use App\Models\InsuranceCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class InsuranceCategoriesTableSeeder extends Seeder
{
    public function run()
    {
        $categories = [
            [
                'title' => 'Boat',
                'slug' => 'boat'
            ],
            [
                'title' => 'Health',
                'slug' => 'health'
            ],
            [
                'title' => 'Home',
                'slug' => 'home'
            ],
            [
                'title' => 'Life',
                'slug' => 'life'
            ],
            [
                'title' => 'Motor',
                'slug' => 'motor'
            ],
            [
                'title' => 'Travel',
                'slug' => 'travel'
            ],
        ];

        foreach ($categories as $category) {
            InsuranceCategory::create($category);
        }
    }
}
