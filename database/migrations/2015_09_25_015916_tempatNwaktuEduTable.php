<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TempatNwaktuEduTable extends Migration
{

    public function up()
    {
        Schema::create('value-edu', function(Blueprint $kolom){
            $kolom->increments('id');
            $kolom->unsignedInteger('user_id')->nullable();
            $kolom->string('namaSekolah_kota');
            $kolom->text('description')->nullable();
            $kolom->integer('start');
            $kolom->integer('finish');
            $kolom->boolean('published')->default(false);
        });
        Schema::table('value-edu', function(Blueprint $kolom){
            $kolom->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }


    public function down()
    {
        Schema::drop('value-edu');
    }
}
