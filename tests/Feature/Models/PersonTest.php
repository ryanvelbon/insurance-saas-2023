<?php

namespace Tests\Feature\Models;

use App\Models\Person;
use App\Models\Team;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PersonTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        // Ensure a team exists for the person factory.
        Team::factory()->create();
    }


    public function test_it_can_fetch_natural_persons()
    {
        $this->seed();

        $naturalPerson = Person::factory()->create(['type' => Person::TYPE_NATURAL]);
        $juridicalPerson = Person::factory()->create(['type' => Person::TYPE_JURIDICAL]);

        $results = Person::natural()->get();

        $this->assertCount(1, $results);
        $this->assertTrue($results->first()->is($naturalPerson));
    }

    public function test_it_can_fetch_juridical_persons()
    {
        $this->seed();

        $naturalPerson = Person::factory()->create(['type' => Person::TYPE_NATURAL]);
        $juridicalPerson = Person::factory()->create(['type' => Person::TYPE_JURIDICAL]);

        $results = Person::juridical()->get();

        $this->assertCount(1, $results);
        $this->assertTrue($results->first()->is($juridicalPerson));
    }
}
