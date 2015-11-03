<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PendidikanValue extends Migration
{

    public function up()
    {
        Schema::create('pendidikan_value', function(Blueprint $kolom){
            $kolom->increments('id');
            $kolom->unsignedInteger('pendidikan_id')->nullable();
            $kolom->unsignedInteger('pendidikan_value_id')->nullable();
        });

        Schema::table('pendidikan_value', function(Blueprint $kolom){
            $kolom->foreign('pendidikan_id')
                ->references('id')
                ->on('pendidikan')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $kolom->foreign('pendidikan_value_id')
                ->references('id')
                ->on('value-edu')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }


    public function down()
    {
        Schema::drop('pendidikan_value');
    }
}
