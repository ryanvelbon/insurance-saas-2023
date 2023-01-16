<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Config;

use App\Models\Insurer;
use App\Models\Country;


class InsurerFactory extends Factory
{
    protected $model = Insurer::class;

    public function definition()
    {
        $website = explode("@", $this->faker->companyEmail())[1];
        $name = ucfirst(explode(".", $website)[0]) . " " . $this->faker->companySuffix();

        $isos = Config::get('constants.targetMarketCountries');
        $country = Country::where('iso', $isos[array_rand($isos)])->first();
        $nDigits = !empty($country->phone_nsn) ? $country->phone_nsn : 7; // if no NSN, use 7 digits

        return [
            'name' => $name,
            'description' => $this->faker->text($maxNbChars=100),
            'country_id' => $country->id,
            'website' => $website,
            'email' => ['hello', 'admin', 'info'][rand(0,2)]  . '@' . $website,
            'phone' => '+'.$country->phonecode.rand(10**($nDigits-1),10**$nDigits-1),
        ];
    }
}