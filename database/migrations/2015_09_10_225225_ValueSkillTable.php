<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ValueSkillTable extends Migration
{

    public function up()
    {
        Schema::create('ValueSkill', function(Blueprint $kolom){
            $kolom->increments('id');
            $kolom->unsignedInteger('user_id')->nullable();
            $kolom->integer('value');
            $kolom->timestamps();
        });
        Schema::table('ValueSkill', function(Blueprint $kolom){
            $kolom->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }


    public function down()
    {
        Schema::drop('ValueSkill');
    }
}
