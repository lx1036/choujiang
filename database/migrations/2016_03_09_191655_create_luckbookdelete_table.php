<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLuckbookdeleteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('luckbooks', function (Blueprint $table) {
//            $table->string('number')->change();
//            $table->dropColumn('number');
            $table->renameColumn('name', 'name_person');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('luckbooks', function (Blueprint $table) {
            //
        });
    }
}
