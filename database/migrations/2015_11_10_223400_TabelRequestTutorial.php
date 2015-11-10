<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TabelRequestTutorial extends Migration
{
    public function up()
    {
        Schema::create('request_tutorial',function(Blueprint $kolom){
            $kolom->increments('id');
            $kolom->unsignedInteger('user_id');
            $kolom->string('title');
            $kolom->text('description');
            $kolom->timestamps();
        });

        Schema::table('request_tutorial', function(Blueprint $kolom){
            $kolom->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }


    public function down()
    {
        Schema::drop('request_tutorial');
    }
}
