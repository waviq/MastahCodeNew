<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class KategoriTabble extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kategori', function (Blueprint $tabel)
        {
            $tabel->increments('id');
            $tabel->string('namaKategori');
            $tabel->timestamps();
        });

        Schema::create('detail_kategori', function (Blueprint $tabel)
        {
            $tabel->integer('post_id')->unsigned()->index();
            $tabel->foreign('post_id')->references('id')->on('posts')->onDelete('cascade');

            $tabel->integer('kategori_id')->unsigned()->index();
            $tabel->foreign('kategori_id')->references('id')->on('kategori')->onDelete('cascade');

            $tabel->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('kategori');
        Schema::drop('detail_kategori');
    }
}
