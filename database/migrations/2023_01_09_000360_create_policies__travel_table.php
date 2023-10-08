<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('policies__travel', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('policy_id');
            $table->foreign('policy_id')->references('id')->on('policies')->onDelete('CASCADE');

            // Travel Details
            $table->date('departure_date')->comment('Start date of the trip');
            $table->date('return_date')->comment('End date of the trip');
            $table->string('destination_country')->comment('Primary destination of the trip');
            $table->boolean('multiple_countries')->default(false)->comment('Whether the travel includes multiple countries');

            // Type of Trip
            $table->string('trip_type')->comment('E.g., vacation, business, study abroad');

            // Coverage Details
            $table->boolean('trip_cancellation_coverage')->default(false)->comment('Coverage for trip cancellations');
            $table->boolean('baggage_loss_coverage')->default(false)->comment('Coverage for lost baggage');
            $table->boolean('medical_emergency_coverage')->default(false)->comment('Coverage for medical emergencies during the trip');
            $table->boolean('travel_delay_coverage')->default(false)->comment('Coverage for delays in travel, such as missed connections');

            // Specific Medical Details
            $table->boolean('pre_existing_conditions')->default(false)->comment('Whether the traveler has pre-existing medical conditions');
            $table->text('medical_conditions_detail')->nullable()->comment('Details of the traveler\'s pre-existing conditions, if applicable');

            // Optional Add-ons
            $table->boolean('adventure_sports_coverage')->default(false)->comment('Additional coverage for adventure sports during the trip, like skiing or scuba diving');
            $table->boolean('rental_car_coverage')->default(false)->comment('Coverage for rental cars during the trip');
            $table->boolean('evacuation_coverage')->default(false)->comment('Coverage for emergency evacuations, often for medical or safety reasons');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('policies__travel');
    }
};
