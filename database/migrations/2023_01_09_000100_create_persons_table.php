<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonsTable extends Migration
{
    public function up()
    {
        Schema::create('persons', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('email')->unique();
            $table->string('phone')->unique();
            $table->unsignedTinyInteger('type');
            $table->foreignId('domicile_country_id')->nullable()->references('id')->on('countries');
            $table->foreignId('team_id')->nullable()->references('id')->on('teams');
            $table->foreignId('created_by')->nullable()->references('id')->on('users');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('persons');
    }
}