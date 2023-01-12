<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonsJuridicalTable extends Migration
{
    public function up()
    {
        Schema::create('persons__juridical', function (Blueprint $table) {
            $table->unsignedBigInteger('id')->unique();
            $table->string('name')->unique();
            $table->string('description')->nullable();
            $table->string('type')->nullable();
            $table->string('size')->nullable();
            $table->year('founded')->nullable();
            $table->string('status')->nullable();
            $table->string('website')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('id')->references('id')->on('persons');
        });
    }

    public function down()
    {
        Schema::dropIfExists('persons__juridical');
    }
}