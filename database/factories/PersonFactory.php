<?php

namespace Database\Factories;

use App\Models\Country;
use App\Models\Person;
use App\Models\NaturalPerson;
use App\Models\JuridicalPerson;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Config;


class PersonFactory extends Factory
{
    protected $model = Person::class;

    public function definition()
    {
        $isos = Config::get('constants.targetMarketCountries');
        $iso = $isos[array_rand($isos)];
        $country = Country::where('iso', $iso)->first();

        return [
            'email'  => $this->faker->email(),
            'phone'  => rand(10000000, 999999999999),
            'type'   => rand(1,2),
            'domicile_country_id' => $country->id,
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

    private function generateNaturalPerson($person) {

        // adds a 5% chance of person being a foreigner/expat
        $country = (rand(1,20) > 19)
                        ? Country::inRandomOrder()->first()
                        : Country::findOrFail($person->domicile->id);

        NaturalPerson::create([
            'person_id' => $person->id,
            'passport_no' => $country->iso.rand(10000000,99999999), // *REVISE*
            'first_name' => $this->faker->firstName(),
            'last_name' => $this->faker->lastName(),
            'nationality' => $country->id,
            'gender' => rand(0,1),
            'dob' => date('Y-m-d', rand(strtotime("-80 year"), strtotime("-18 year")))
        ]);
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
