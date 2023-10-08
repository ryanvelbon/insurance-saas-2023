<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('policies__boat', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('policy_id');
            $table->foreign('policy_id')->references('id')->on('policies')->onDelete('CASCADE');

            // Boat details
            $table->string('boat_type')->comment('E.g. Sailboat, Motorboat, Yacht, etc.');
            $table->string('make')->nullable()->comment('Brand or make of the boat');
            $table->string('model')->nullable();
            $table->string('registration_no')->unique()->comment('Boat registration number');
            $table->year('manufacturing_year')->nullable();
            $table->decimal('length', 8, 2)->comment('Length of the boat in feet or meters');
            $table->string('hull_type')->nullable()->comment('E.g. Fiberglass, Aluminum, Wood, etc.');
            $table->boolean('is_new_boat')->default(false)->comment('True if the boat is brand new');

            // Insurance coverage details
            $table->boolean('liability_coverage')->default(false)->comment('Coverage for third-party injury or property damage');
            $table->boolean('collision_coverage')->default(false)->comment('Coverage for boat damage due to collision');
            $table->boolean('comprehensive_coverage')->default(false)->comment('Coverage for non-collision related damage like theft, fire, etc.');

            // Additional coverages specific to boats
            $table->boolean('towing_and_assistance')->default(false)->comment('Coverage for on-water towing and assistance');
            $table->boolean('fishing_equipment_coverage')->default(false)->comment('Coverage for fishing equipment on the boat');
            $table->boolean('personal_effects_coverage')->default(false)->comment('Coverage for personal items on the boat');

            // Deductibles
            $table->decimal('liability_deductible', 15, 2)->nullable();
            $table->decimal('collision_deductible', 15, 2)->nullable();
            $table->decimal('comprehensive_deductible', 15, 2)->nullable();

            // Optional details
            $table->boolean('watersports_coverage')->default(false)->comment('Coverage for activities like water skiing or wakeboarding');
            $table->text('notes')->nullable()->comment('Any additional notes or comments about the policy');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('policies__boat');
    }
};
