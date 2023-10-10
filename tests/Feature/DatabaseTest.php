<?php

namespace Tests\Feature;

use App\Models\Country;
use App\Models\InsuranceCategory;
use App\Models\Insurer;
use App\Models\Policy;
use App\Models\Role;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class DatabaseTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Ensures that database is seeded with the data required for the basic
     * functioning of the app.
     */
    public function test_database_seeder_does_not_add_dummy_data()
    {
        $this->seed();

        // --- These tables should be populated ---

        $countries = Country::all();
        $this->assertCount(252, $countries);

        $categories = InsuranceCategory::all();
        $this->assertCount(6, $categories);

        $roles = Role::all();
        $this->assertCount(8, $roles);

        // --- These tables should be empty ---

        $users = User::all();
        $this->assertCount(0, $users);

        $insurers = Insurer::all();
        $this->assertCount(0, $insurers);

        $policies = Policy::all();
        $this->assertCount(0, $policies);
    }
}
