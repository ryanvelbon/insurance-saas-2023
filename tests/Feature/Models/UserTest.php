<?php

namespace Tests\Feature\Models;

use App\Enums\RoleTitle;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserTest extends TestCase
{
    use RefreshDatabase;

    public function test_it_does_not_have_a_role_upon_creation()
    {
        $this->seed();
        $user = User::factory()->create();

        $this->assertCount(0, $user->roles);

    }

    public function test_it_can_be_assigned_a_role()
    {
        $this->seed();
        $user = User::factory()->create();

        $user->assignRole(RoleTitle::SALES_AGENT);

        $this->assertCount(1, $user->roles);
        $this->assertTrue($user->hasRole(RoleTitle::SALES_AGENT));
    }

    public function test_it_can_be_assigned_multiple_roles()
    {
        $this->seed();
        $user = User::factory()->create();

        $user->assignRole(RoleTitle::SALES_AGENT);
        $user->assignRole(RoleTitle::UNDERWRITER);
        $user->assignRole(RoleTitle::CLAIMS_ADJUSTER);

        $this->assertCount(3, $user->roles);
    }

    public function test_its_other_roles_are_not_affected()
    {
        $this->seed();
        $user = User::factory()->create();

        $user->assignRole(RoleTitle::SALES_AGENT);

        $this->assertCount(1, $user->roles);
        
        $user->assignRole(RoleTitle::UNDERWRITER);

        $user->refresh();

        $this->assertCount(2, $user->roles);
        $this->assertTrue($user->hasRole(RoleTitle::SALES_AGENT));
        $this->assertTrue($user->hasRole(RoleTitle::UNDERWRITER));
    }

    public function test_it_cannot_be_assigned_the_same_role_twice()
    {
        $this->seed();
        $user = User::factory()->create();

        $user->assignRole(RoleTitle::SALES_AGENT);

        $this->assertCount(1, $user->roles);
        
        $user->assignRole(RoleTitle::SALES_AGENT);

        $user->refresh();

        $this->assertCount(1, $user->roles);
    }

    public function test_it_can_have_a_role_removed()
    {
        $this->seed();
        $user = User::factory()->create();

        $user->assignRole(RoleTitle::SALES_AGENT);
        $user->assignRole(RoleTitle::UNDERWRITER);
        $user->assignRole(RoleTitle::CLAIMS_ADJUSTER);
        $this->assertCount(3, $user->roles);
        $user->removeRole(RoleTitle::CLAIMS_ADJUSTER);
        $user->refresh();
        $this->assertCount(2, $user->roles);
        $user->removeRole(RoleTitle::SALES_AGENT);
        $user->refresh();
        $this->assertCount(1, $user->roles);
        $user->removeRole(RoleTitle::UNDERWRITER);
        $user->refresh();
        $this->assertCount(0, $user->roles);
    }

    public function test_removing_a_role_that_does_not_exist_does_not_throw_an_error()
    {
        $this->seed();
        $user = User::factory()->create();

        $user->assignRole(RoleTitle::SALES_AGENT);
        $this->assertCount(1, $user->roles);
        $user->removeRole(RoleTitle::UNDERWRITER);
        $this->assertCount(1, $user->roles);
    }
}
