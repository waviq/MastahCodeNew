<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function(Blueprint $kolom){
            $kolom->increments('id');
            $kolom->string('name');
            $kolom->string('email');
            $kolom->text('content');
            $kolom->integer('post_id')->unsigned();
            $kolom->integer('user_id')->unsigned();
            $kolom->boolean('seen')->default(false);

            $kolom->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $kolom->foreign('post_id')->references('id')->on('posts')->onDelete('cascade');

            $kolom->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('comments');
    }
}
