<?php

namespace Tests\Feature\Persons;

use App\Models\Person;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PersonTest extends TestCase
{
    public function test_it_can_fetch_natural_persons()
    {
        $naturalPerson = Person::factory()->create(['type' => Person::TYPE_NATURAL]);
        $juridicalPerson = Person::factory()->create(['type' => Person::TYPE_JURIDICAL]);

        $results = Person::natural()->get();

        $this->assertCount(1, $results);
        $this->assertTrue($results->first()->is($naturalPerson));
    }

    public function test_it_can_fetch_juridical_persons()
    {
        $naturalPerson = Person::factory()->create(['type' => Person::TYPE_NATURAL]);
        $juridicalPerson = Person::factory()->create(['type' => Person::TYPE_JURIDICAL]);

        $results = Person::juridical()->get();

        $this->assertCount(1, $results);
        $this->assertTrue($results->first()->is($juridicalPerson));
    }
}
