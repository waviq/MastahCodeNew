<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SosialMediaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sosmed',function(Blueprint $kolom){
            $kolom->increments('id');
            $kolom->unsignedInteger('user_id')->nullable()->unique();
            $kolom->string('email');
            $kolom->string('facebook');
            $kolom->string('twitter');
            $kolom->string('linkedin');
            $kolom->string('skype');
            $kolom->timestamps();
        });
        Schema::table('sosmed',function(Blueprint $kolom){
            $kolom->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('sosmed');
    }
}
