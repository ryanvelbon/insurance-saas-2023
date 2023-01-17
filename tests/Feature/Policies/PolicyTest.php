<?php

namespace Tests\Feature\Policies;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PolicyTest extends TestCase
{
    use RefreshDatabase;

    public function test_policies_index_page_is_displayed(): void
    {
        $user = User::factory()->create();

        $response = $this
            ->actingAs($user)
            ->get('/policies');

        $response->assertStatus(200);
    }

    public function test_policies_create_page_is_displayed(): void
    {
        $user = User::factory()->create();

        $this->actingAs($user)->get('/policies/life/create')->assertStatus(200);
        $this->actingAs($user)->get('/policies/motor/create')->assertStatus(200);
        $this->actingAs($user)->get('/policies/travel/create')->assertStatus(200);
    }
}
