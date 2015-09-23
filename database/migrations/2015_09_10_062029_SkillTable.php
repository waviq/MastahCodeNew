<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SkillTable extends Migration
{

    public function up()
    {
        Schema::create('skills', function(Blueprint $kolom){
            $kolom->increments('id');
            $kolom->string('namaSkill');
            $kolom->timestamps();
        });
    }


    public function down()
    {
        Schema::drop('skills');
    }
}
