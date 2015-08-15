<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class FKUsersRoleTable extends Migration
{
    public function up()
    {
        Schema::table('users', function(Blueprint $table) {
            $table->foreign('role_id')
                ->references('id')
                ->on('roles')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }

    public function down()
    {
        Schema::table('users', function(Blueprint $table) {
            $table->dropForeign('users_role_id_foreign');
        });
    }
}
