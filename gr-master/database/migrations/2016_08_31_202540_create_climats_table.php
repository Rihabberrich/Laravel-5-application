<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClimatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('climats', function (Blueprint $table) {
            $table->increments('id');
            $table->float('tmax');
            $table->float('tmin');
            $table->float('text');
            $table->float('hmes');
            $table->float('vmes');
            $table->string('date_string');
            $table->float('rs')->nullable();
            $table->float('dinst')->nullable();
            $table->integer('krs')->nullable();
            $table->integer('date');
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
        Schema::drop('climats');
    }
}
