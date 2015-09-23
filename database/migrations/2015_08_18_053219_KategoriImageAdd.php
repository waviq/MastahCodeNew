<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class KategoriImageAdd extends Migration
{

    public function up()
    {
        Schema::table('kategori',function(Blueprint $kolom){
           $kolom->string('image');
        });
    }


    public function down()
    {
        Schema::table('kategori', function(Blueprint $kolom){
           $kolom->dropColumn('image');
        });
    }
}
