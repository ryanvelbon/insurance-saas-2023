<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToPoliciesTable extends Migration
{
    public function up()
    {
        Schema::table('policies', function (Blueprint $table) {
            $table->foreignId('category_id')->references('id')->on('insurance_categories');
            $table->foreignId('insurer_id')->references('id')->on('insurers');
            $table->foreignId('policyholder_id')->references('id')->on('persons');
            $table->foreignId('agent_id')->references('id')->on('users');
            $table->foreignId('team_id')->references('id')->on('teams');
            $table->foreignId('created_by')->nullable()->references('id')->on('users');
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
            $table->dropForeign('policies_created_by_foreign');
        });
    }
}