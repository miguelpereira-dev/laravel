<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEpisodiosTable extends Migration
{
    public function up()
    {
        Schema::create('episodios', function (Blueprint $table) {
            $table->id();
            $table->integer('numero');
            $table->integer('temporada_id');
            $table->foreign('temporada_id')->references('id')->on('temporadas');
        });
    }

    public function down()
    {
        Schema::dropIfExists('episodios');
    }
}
