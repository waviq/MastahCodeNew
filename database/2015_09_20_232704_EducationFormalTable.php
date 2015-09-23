<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class EducationFormalTable extends Migration
{

    public function up()
    {
        Schema::create('formalEdu',function(Blueprint $kolom){
            $kolom->increments('id');
            $kolom->unsignedInteger('user_id');
            $kolom->string('SD')->nullable();
            $kolom->string('SMP')->nullable();
            $kolom->string('SMA')->nullable();
            $kolom->string('kuliah_s1')->nullable();
            $kolom->string('kuliah_s2')->nullable();
            $kolom->string('kuliah_s3')->nullable();
            $kolom->boolean('published')->default(false);
        });

        Schema::table('formalEdu', function(Blueprint $kolom){
            $kolom->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }


    public function down()
    {
        Schema::drop('education');
    }
}
