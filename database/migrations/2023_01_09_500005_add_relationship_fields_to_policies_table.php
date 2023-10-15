<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToPoliciesTable extends Migration
{
    public function up()
    {
        Schema::table('policies', function (Blueprint $table) {
            $table->unsignedBigInteger('category_id');
            $table->foreign('category_id')->references('id')->on('insurance_categories');
            $table->unsignedBigInteger('insurer_id');
            $table->foreign('insurer_id')->references('id')->on('insurers');
            $table->unsignedBigInteger('policyholder_id');
            $table->foreign('policyholder_id')->references('id')->on('persons');
            $table->unsignedBigInteger('agent_id');
            $table->foreign('agent_id')->references('id')->on('users');
            $table->unsignedBigInteger('team_id');
            $table->foreign('team_id')->references('id')->on('teams');
        });
    }

    public function down()
    {
        Schema::table('policies', static function (Blueprint $table) {
            $table->dropForeign('policies_category_id_foreign');
            $table->dropForeign('policies_insurer_id_foreign');
            $table->dropForeign('policies_policyholder_id_foreign');
            $table->dropForeign('policies_agent_id_foreign');
            $table->dropForeign('policies_team_id_foreign');
        });
    }
}