<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RoleTable extends Migration
{
    public function up()
    {
        Schema::create('roles', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('title', 50);
            $table->string('slug', 10);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::drop('roles');
    }
}
