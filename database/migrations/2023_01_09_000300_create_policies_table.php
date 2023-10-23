<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('policies', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('policy_no');
            $table->string('coverage_type');
            $table->date('start_date');
            $table->date('end_date');
            $table->string('status')->nullable();
            $table->string('layer')->nullable();
            $table->string('currency');
            $table->decimal('gross_premium', 15, 2);
            $table->decimal('brokerage_deduction', 15, 2)->nullable();
            $table->decimal('excess', 15, 2);
            $table->decimal('limit_amount', 15, 2);
            $table->foreignId('category_id')->references('id')->on('insurance_categories');
            $table->foreignId('insurer_id')->references('id')->on('insurers');
            $table->foreignId('policyholder_id')->references('id')->on('persons');
            $table->foreignId('agent_id')->references('id')->on('users');
            $table->foreignId('team_id')->references('id')->on('teams');
            $table->foreignId('created_by')->nullable()->references('id')->on('users');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('policies');
    }
};
