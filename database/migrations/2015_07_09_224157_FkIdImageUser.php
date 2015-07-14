<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class FkIdImageUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('image_user',function(Blueprint $kolom){

            $kolom->unsignedInteger('user_id')->nullable();

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
        Schema::table('image_user', function(Blueprint $kolom){
            $kolom->dropForeign('image_user_user_id_foreign');
            $kolom->dropColumn('user_id');
        });
    }
}
/*Schema::table('image_user', function(Blueprint $kolom){
    $kolom->dropForeign('users_image_user_id_foreign');
    $kolom->dropColumn('image_user_id');
});*/