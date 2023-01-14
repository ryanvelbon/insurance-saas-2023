<?php

namespace Database\Factories;

use App\Models\Person;
use App\Models\JuridicalPerson;

use Illuminate\Database\Eloquent\Factories\Factory;

class PersonFactory extends Factory
{
    protected $model = Person::class;

    public function definition()
    {
        return [
            'email'  => $this->faker->email(),
            'phone'  => rand(10000000, 999999999999),
            'type'   => 2,
        ];
    }

    public function configure()
    {
        return $this->afterCreating(function (Person $person) {

            switch ($person->type) {
                case Person::TYPE_NATURAL:
                    $this->generateNaturalPerson($person);
                    break;
                case Person::TYPE_JURIDICAL:
                    $this->generateJuridicalPerson($person);
                    break;
                default:
                    echo "Whoops! something went wrong!";
                    break;
            }
        });
    }

    private function generateJuridicalPerson($person) {

        $website = $this->generateWebsiteName();

        $person->email = ['hello', 'admin', 'info'][rand(0,2)]  . '@' . $website;
        $person->save();

        JuridicalPerson::create([
            'person_id' => $person->id,
            'name' => ucfirst(explode(".", $website)[0]) . " " . $this->faker->companySuffix(),
            'description' => $this->faker->text($maxNbChars=100),
            'type' => null,
            'size' => rand(1,6),
            'founded' => date('Y') - rand(0,40),
            'status' => null,
            'website' => $website,
        ]);
    }

    /**
     * Generates a unique value for `website` field
     */
    private function generateWebsiteName() {

        $isUnique = false;

        while (!$isUnique) {
            $website = explode('@', $this->faker->companyEmail())[1];
            $isUnique = !(JuridicalPerson::where('website', $website)->exists());
        }

        return $website;
    }
}
