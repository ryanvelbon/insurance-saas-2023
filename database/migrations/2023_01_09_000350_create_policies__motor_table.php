<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('policies__motor', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('policy_id');
            $table->foreign('policy_id')->references('id')->on('policies')->onDelete('CASCADE');

            // Vehicle details
            $table->string('vehicle_type')->comment('E.g. Sedan, SUV, Truck, etc.');
            $table->string('make')->comment('E.g. Toyota, Honda, Ford, etc.');
            $table->string('model');
            $table->string('license_plate_no');
            $table->year('manufacturing_year');
            $table->string('vehicle_identification_number')->unique();
            $table->string('engine_number')->nullable();
            $table->string('color');
            $table->boolean('is_new_vehicle')->default(false)->comment('True if the vehicle is brand new');

            // Insurance coverage details
            $table->boolean('liability_coverage')->default(false)->comment('Coverage for third-party injury or property damage');
            $table->boolean('collision_coverage')->default(false)->comment('Coverage for vehicle damage due to collision');
            $table->boolean('comprehensive_coverage')->default(false)->comment('Coverage for non-collision related damage like theft, fire, etc.');

            // Deductibles
            $table->decimal('liability_deductible', 15, 2)->nullable();
            $table->decimal('collision_deductible', 15, 2)->nullable();
            $table->decimal('comprehensive_deductible', 15, 2)->nullable();

            // Driver information (Can be expanded into its own table if multiple drivers are insured for the same vehicle)
            $table->string('primary_driver_name');
            $table->date('primary_driver_dob');
            $table->string('primary_driver_license_no')->unique();

            // Optional details
            $table->boolean('roadside_assistance')->default(false)->comment('Whether the policy includes roadside assistance');
            $table->text('notes')->nullable()->comment('Any additional notes or comments about the policy');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('policies__motor');
    }
};
