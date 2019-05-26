<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserClaseKeys extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('user_clase', function (Blueprint $table) {
            $table->foreign('clase_id')->references('id')->on('clases');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('user_clase', function (Blueprint $table) {
            $table->dropForeign(['clase_id']);
            $table->dropForeign(['user_id']);
        });
    }
}
