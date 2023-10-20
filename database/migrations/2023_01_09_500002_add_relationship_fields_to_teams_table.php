<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToTeamsTable extends Migration
{
    public function up()
    {
        Schema::table('teams', function (Blueprint $table) {
            $table->foreignId('owner_id')->nullable()->references('id')->on('users');
        });
    }

    public function down()
    {
        Schema::table('teams', static function (Blueprint $table) {
            $table->dropForeign('teams_owner_id_foreign');
        });
    }
}