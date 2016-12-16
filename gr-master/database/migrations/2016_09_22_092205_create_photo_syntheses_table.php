<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePhotoSynthesesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('photo_syntheses', function (Blueprint $table) {
            $table->increments('id');
            $table->double('tint');
            $table->string('heure');
            $table->double('temperature');
            $table->double('pb');
            $table->double('par');
            $table->double('rs');
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
        Schema::drop('photo_syntheses');
    }
}
