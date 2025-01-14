<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToUsersTable extends Migration
{
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->foreignId('team_id')->nullable()->references('id')->on('teams');
        });
    }

    public function down()
    {
        Schema::table('users', static function (Blueprint $table) {
            $table->dropForeign('users_team_id_foreign');
        });
    }
}