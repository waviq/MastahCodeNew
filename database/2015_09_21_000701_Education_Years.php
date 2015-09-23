<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class EducationYears extends Migration
{

    public function up()
    {
        Schema::create('formalEdu_years', function(Blueprint $kolom){
            $kolom->increments('id');
            $kolom->unsignedInteger('formal_edu_id')->nullable();
            $kolom->unsignedInteger('years_edu_id')->nullable();
        });

        Schema::table('formalEdu_years', function(Blueprint $kolom){
           $kolom->foreign('formal_edu_id')
               ->references('id')
               ->on('formaldu')
               ->onDelete('cascade')
               ->onUpdate('cascade');

            $kolom->foreign('years_edu_id')
                ->references('id')
                ->on('Yearseducation')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }


    public function down()
    {
        Schema::drop('formaledu_years');
    }
}
