<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PostTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts',function(Blueprint $tabel){
            $tabel->increments('id');
            $tabel->string('judul',255);
            $tabel->string('slug', 255)->unique;
            $tabel->text('ringkasan');
            $tabel->string('kataKunci');
            $tabel->text('kontenFull');
            $tabel->boolean('published')->default(false);
            $tabel->boolean('seen')->default(false);
            $tabel->boolean('active')->default(false);
            $tabel->integer('user_id')->unsigned();
            $tabel->timestamps();
        });

        Schema::table('posts', function(Blueprint $tabel){
           $tabel->foreign('user_id')->references('id')->on('users')
               ->onDelete('restrict')
               ->onUpdate('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('posts', function(Blueprint $tabel){
           $tabel->dropForeign('posts_user_id_foreign');
        });
        Schema::drop('posts');
    }
}
