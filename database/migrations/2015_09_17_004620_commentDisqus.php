<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CommentDisqus extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comment_disqus',function(Blueprint $kolom){
            $kolom->increments('id');
            $kolom->char('comment_id');
            $kolom->char('parent_id',32)->nullable();
            $kolom->string('slug');
            $kolom->text('body');
            $kolom->char('author_name',200);
            $kolom->char('profile_url',200);
            $kolom->char('gravatar_url',200);
            $kolom->integer('count_post');
            $kolom->integer('likes');
            $kolom->integer('dislikes');
            $kolom->timestamp('date');
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
        Schema::drop('comment_disqus');
    }
}
