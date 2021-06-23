<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTemporadasTable extends Migration
{
    public function up()
    {
        Schema::create('temporadas', function (Blueprint $table) {
            $table->id();
            $table->integer('numero');
            $table->integer('serie_id');
            $table->foreign('serie_id')->references('id')->on('series');
        });
    }

    public function down()
    {
        Schema::dropIfExists('temporadas');
    }
}
