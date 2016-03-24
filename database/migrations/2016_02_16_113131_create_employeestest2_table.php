<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeestest2Table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employeestest2', function (Blueprint $table) {
            $table->increments('id');
            $table->string('number')->unique();
//            $table->integer('number');
            $table->char('name');
            $table->char('department');
            $table->integer('wintimes')->default(0);
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
        Schema::drop('employeestest2');
    }
}
