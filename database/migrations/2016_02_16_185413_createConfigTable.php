<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConfigTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //create configtable
        Schema::create('config', function (Blueprint $table) {
            $table->increments('id');
            $table->char('key');
            $table->char('value');
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
//        Schema::dropIfExists('config');
    }
}
