<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('insurers', function (Blueprint $table) {
          $table->id();
          $table->string('name', 80);
          $table->string('description', 1000)->nullable();
          $table->string('website', 100);
          $table->string('email')->unique();
          $table->string('phone', 15);
          $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('insurers');
    }
};
