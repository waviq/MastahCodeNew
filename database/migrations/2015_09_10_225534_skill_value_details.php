<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SkillValueDetails extends Migration
{

    public function up()
    {
        Schema::create('skill_value', function(Blueprint $kolom){
            $kolom->increments('id');
            $kolom->unsignedInteger('skill_id')->nullable();
            $kolom->unsignedInteger('value_id')->nullable();
        });

        Schema::table('skill_value', function(Blueprint $kolom){
            $kolom->foreign('skill_id')
                ->references('id')
                ->on('skills')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $kolom->foreign('value_id')
                ->references('id')
                ->on('ValueSkill')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }


    public function down()
    {
        Schema::drop('skill_value');
    }
}
