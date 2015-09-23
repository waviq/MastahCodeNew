<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class JobUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobs', function(Blueprint $kolom){
            $kolom->increments('id');
            $kolom->unsignedInteger('user_id')->nullable()->unique();
            $kolom->string('Job');
            $kolom->string('position');
            $kolom->text('description');
            $kolom->timestamps();
        });

        Schema::table('jobs', function(Blueprint $kolom){
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
        Schema::drop('jobs');
    }
}
