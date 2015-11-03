<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PendidikanTable extends Migration
{
    public function up()
    {
        Schema::create('pendidikan', function(Blueprint $kolom){
            $kolom->increments('id');
            $kolom->string('namaPendidikan');
        });
    }

    public function down()
    {
        Schema::drop('pendidikan');
    }
}
