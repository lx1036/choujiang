<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMsgTextTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('msg_text', function (Blueprint $table) {
            $table->increments('id');
            $table->string('to_user_name');
            $table->string('openid');
            $table->string('msg_type');
            $table->string('content');
            $table->bigInteger('msg_id');
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
        Schema::dropIfExists('msg_text');
    }
}
