<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('username', 30)->unique();
            $table->string('name');
            $table->date('tanggalLahir');
            $table->enum('JenisKelamin', array('Pria','Wanita'));
            $table->string('alamat');
            $table->string('nomorTelfon')->unique();
            $table->string('email')->unique();
            $table->string('password', 60);
            $table->unsignedInteger('role_id')->nullable();
            $table->boolean('seen')->default(false);
            $table->boolean('valid')->default(false);
            $table->timestamps();
            $table->rememberToken();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('users');
    }
}
