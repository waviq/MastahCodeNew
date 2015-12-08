<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class WritingTable extends Migration
{

    public function up()
    {
        Schema::create('writing',function(Blueprint $kolom){
            $kolom->increments('id');
            $kolom->string('title');
            $kolom->text('isi');
        });
    }


    public function down()
    {
        Schema::drop('writing');
    }
}
