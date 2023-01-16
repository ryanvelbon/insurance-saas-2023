<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToInsurersTable extends Migration
{
    public function up()
    {
        Schema::table('insurers', function (Blueprint $table) {
            $table->unsignedBigInteger('country_id')->nullable();
            $table->foreign('country_id')->references('id')->on('countries');
        });
    }

    public function down()
    {
        Schema::table('insurers', static function (Blueprint $table) {
            $table->dropForeign('insurers_country_id_foreign');
        });
    }
}