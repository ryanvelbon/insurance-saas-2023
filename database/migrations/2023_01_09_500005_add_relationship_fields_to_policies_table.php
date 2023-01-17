<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToPoliciesTable extends Migration
{
    public function up()
    {
        Schema::table('policies', function (Blueprint $table) {
            $table->unsignedBigInteger('insurer_id')->nullable();
            $table->foreign('insurer_id')->references('id')->on('insurers');
            $table->unsignedBigInteger('policyholder_id')->nullable();
            $table->foreign('policyholder_id')->references('id')->on('persons');
            $table->unsignedBigInteger('agent_id')->nullable();
            $table->foreign('agent_id')->references('id')->on('users');
        });
    }

    public function down()
    {
        Schema::table('policies', static function (Blueprint $table) {
            $table->dropForeign('policies_insurer_id_foreign');
            $table->dropForeign('policies_policyholder_id_foreign');
            $table->dropForeign('policies_agent_id_foreign');
        });
    }
}