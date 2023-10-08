<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('policies__home', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('policy_id');
            $table->foreign('policy_id')->references('id')->on('policies')->onDelete('CASCADE');

            // Property Details
            $table->string('property_type')->comment('E.g., detached, semi-detached, apartment, condo, etc.');
            $table->string('property_address')->comment('Address of the insured property');
            $table->decimal('property_value', 15, 2)->comment('Estimated value of the property');
            $table->integer('year_built')->comment('Year when the property was built');
            $table->integer('square_footage')->comment('Total area of the property in square feet');

            // Coverage Details
            $table->boolean('dwelling_coverage')->default(false)->comment('Coverage for damage to the structure of the home');
            $table->boolean('personal_property_coverage')->default(false)->comment('Coverage for loss or damage to the contents of the home');
            $table->boolean('liability_coverage')->default(false)->comment('Coverage against legal liability for accidents that happen on the property');
            $table->boolean('natural_disasters_coverage')->default(false)->comment('Coverage against natural disasters like earthquakes, floods, etc.');
            $table->boolean('theft_coverage')->default(false)->comment('Coverage against theft or burglary');

            // Optional Add-ons or Riders
            $table->boolean('valuables_coverage')->default(false)->comment('Additional coverage for specific valuable items like jewelry, artwork, etc.');
            $table->boolean('sewer_backup_coverage')->default(false)->comment('Coverage for damages caused by the backup of sewers or drains');
            $table->boolean('home_business_coverage')->default(false)->comment('Coverage if a part of the home is used for business purposes');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('policies__home');
    }
};
