<?php

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePermissionRolePivotTable extends Migration
{
    public function up()
    {
        Schema::create('permission_role', function (Blueprint $table) {
            $table->foreignIdFor(Permission::class)->constrained();
            $table->foreignIdFor(Role::class)->constrained();
        });
    }

    public function down()
    {
        Schema::dropIfExists('permission_role');
    }
}