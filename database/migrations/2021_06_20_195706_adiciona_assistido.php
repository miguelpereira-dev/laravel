<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AdicionaAssistido extends Migration
{
    public function up()
    {
        Schema::table('episodios', function (Blueprint $table) {
            $table->boolean('assistido')->default(false);
        });
    }
    public function down()
    {
        Schema::table('episodios', function (Blueprint $table) {
            $table->dropColumn('assistido');
        });
    }
}
