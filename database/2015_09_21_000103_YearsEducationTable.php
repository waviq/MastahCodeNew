<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class YearsEducationTable extends Migration
{

    public function up()
    {
        Schema::create('YearsEducation', function(Blueprint $kolom){
            $kolom->increments('id');
            $kolom->integer('start')->nullable();
            $kolom->integer('finish')->nullable();
        });
    }


    public function down()
    {
        Schema::drop('YearsEducation');
    }
}
