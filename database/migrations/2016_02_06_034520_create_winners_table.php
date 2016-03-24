<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWinnersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create('winners', function (Blueprint $table) {
            $table->increments('id');
            $table->string('openid')->unique();
            $table->bigInteger('times');//抽奖批次
            $table->bigInteger('shakecount');//摇一摇次数
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
//        Schema::dropIfExists('winners');
    }
}
