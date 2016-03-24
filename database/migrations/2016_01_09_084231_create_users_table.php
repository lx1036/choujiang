<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('openid')->unique();
            $table->string('nickname');
            $table->char('sex');
            $table->char('language')->nullable();
            $table->char('city')->nullable();
            $table->char('province')->nullable();
            $table->char('country')->nullable();
            $table->string('headimgurl');
            $table->bigInteger('subscribe_time')->nullable();
//            $table->string('unionid');
//            $table->string('remark');
            $table->unsignedTinyInteger('groupid')->nullable();
            $table->unsignedTinyInteger('is_winner');
            $table->boolean('is_delete')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
//        Schema::drop('users');
//        Schema::dropIfExists('users');
    }
}
