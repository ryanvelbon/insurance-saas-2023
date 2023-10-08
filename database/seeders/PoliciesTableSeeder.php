<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Config;

use App\Models\Team;
use App\Models\User;
use App\Models\InsuranceCategory;
use App\Models\Insurer;
use App\Models\Person;
use App\Models\Policy;
use App\Helpers\MyMath;

class PoliciesTableSeeder extends Seeder
{
    public function run()
    {
        $day = 3600; // n seconds in 1 day

        $currencies = Config::get('constants.policyCurrencies');

        $timestampFinal = strtotime(now());
        $timestampCursor = strtotime("-6 month"); //strtotime("-10 year");

        while ($timestampCursor < $timestampFinal) {

            $team = Team::inRandomOrder()->first();
            $agent = $team->members->shuffle()->first();
            $insurer = Insurer::inRandomOrder()->first();

            // *PENDING* policyholder is either new client or existing client
            $policyholder = Person::factory()->create(['team_id' => $team->id]);

            $coverageType = Policy::COVERAGE_TYPE_SELECT[rand(0,count(Policy::COVERAGE_TYPE_SELECT)-1)]['value'];
            $layer = Policy::LAYER_SELECT[rand(0,count(Policy::LAYER_SELECT)-1)]['value'];

            $startDate = date("Y-m-d", $timestampCursor + rand(0,7) * $day);
            $nMonths = rand(1,4) *3;
            $endDate = date('Y-m-d', strtotime($startDate . "+ $nMonths month"));

            $minPremium = 300;
            $grossPremium = $minPremium + (rand(0,1000)**2)/100;

            $limitAmount = $grossPremium * rand(500,2000);
            $limitAmount = MyMath::roundup($limitAmount);

            $excess = (rand(5,50)/10) * $grossPremium;
            $excess = MyMath::roundup($excess);

            // *REFACTOR* commission rate should be defined in a `sales_channels` table
            $brokerCommissionRate = rand(5,20)/100; // 5% to 20%

            Policy::create([
                'category' => InsuranceCategory::inRandomOrder()->first()->slug,
                'policy_no' => rand(1000000, 9999999), // *PENDING* each insurer should have its own format
                'coverage_type' => $coverageType,
                'start_date' => $startDate,
                'end_date' => $endDate ,
                'layer' => $layer,
                'currency' => 'USD', // *REFACTOR* $insurer->currency,
                'gross_premium' => $grossPremium,
                'brokerage_deduction' => $grossPremium * $brokerCommissionRate,
                'excess' => $excess,
                'limit_amount' => $limitAmount,
                'created_at' => date("Y-m-d H:i:s", $timestampCursor),
                'updated_at' => null,
                'insurer_id' => $insurer->id,
                'policyholder_id' => $policyholder->id,
                'agent_id' => $agent->id,
                'team_id' => $team->id,
            ]);

            // increments time
            $timestampCursor += rand(3600, 36000); // rand(1,3600);
        }
    }
}