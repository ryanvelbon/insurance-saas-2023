<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('policies__life', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('policy_id');
            $table->foreign('policy_id')->references('id')->on('policies')->onDelete('CASCADE');

            // Personal Details
            $table->date('date_of_birth')->comment('Policyholder\'s date of birth');
            $table->string('gender')->comment('Policyholder\'s gender');
            $table->string('smoker_status')->comment('Smoker or Non-Smoker');
            
            // Coverage and Term
            $table->decimal('coverage_amount', 15, 2)->comment('Total coverage amount in case of death');
            $table->integer('term_years')->nullable()->comment('Duration of the policy in years. Null for whole life policies.');
            
            // Beneficiary Details
            $table->string('beneficiary_name')->comment('Primary beneficiary for the policy');
            $table->string('beneficiary_relationship')->comment('Relationship of the beneficiary to the policyholder');
            $table->string('secondary_beneficiary_name')->nullable()->comment('Secondary beneficiary for the policy');
            $table->string('secondary_beneficiary_relationship')->nullable()->comment('Relationship of the secondary beneficiary to the policyholder');

            // Health and Medical History (if applicable)
            $table->text('medical_history')->nullable()->comment('Policyholder\'s medical history details');
            $table->boolean('medical_exam_required')->default(false)->comment('Whether a medical examination is required for policy approval');
            
            // Optional Riders and Add-ons
            $table->boolean('accidental_death_benefit')->default(false)->comment('Additional coverage in case of accidental death');
            $table->boolean('critical_illness_rider')->default(false)->comment('Coverage for specified critical illnesses');
            $table->boolean('disability_income_rider')->default(false)->comment('Provides a monthly income in case of disability');

            // Other optional details
            $table->text('notes')->nullable()->comment('Any additional notes or comments about the policy');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('policies__life');
    }
};
