<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonsNaturalTable extends Migration
{
    public function up()
    {
        Schema::create('persons__natural', function (Blueprint $table) {
            $table->unsignedBigInteger('person_id')->unique();
            $table->string('passport_no', 12)->unique();
            $table->string('first_name', 40);
            $table->string('last_name', 40);
            $table->unsignedBigInteger('nationality');
            $table->tinyInteger('gender');
            $table->date('dob');
            $table->string('marital_status');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('person_id')->references('id')->on('persons');
            $table->foreign('nationality')->references('id')->on('countries');
        });
    }

    public function down()
    {
        Schema::dropIfExists('persons__natural');
    }
}