<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSerresTabele extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('serres', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('nbr');
            $table->integer('type');
            $table->float('c');
            $table->float('w');
            $table->float('l');
            $table->float('h');
            $table->float('e');
            $table->float('d');
            $table->float('ctz');
            $table->float('tc');
            $table->float('alpha');
            $table->float('beta');
            $table->float('hvouv');
            $table->float('stouv');
            $table->float('srf');
            $table->float('ssd');
            $table->float('y');
            $table->integer('zone_id')->unsigned();
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
        Schema::drop('serres');
    }
}
