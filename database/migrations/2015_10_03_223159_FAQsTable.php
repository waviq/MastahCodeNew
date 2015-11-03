<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class FAQsTable extends Migration
{

    public function up()
    {
        Schema::create('faqs',function(Blueprint $kolom){
            $kolom->increments('id');
            $kolom->string('title');
            $kolom->text('isi');
            $kolom->string('image')->nullable();
        });
    }


    public function down()
    {
        Schema::drop('faqs');
    }
}
