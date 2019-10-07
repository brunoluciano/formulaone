<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCampeonatoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('campeonato', function (Blueprint $table) {
            $table->bigIncrements('id');

            // FOREIGN KEY
            $table->unsignedBigInteger('piloto_venc_id');
            $table->foreign('piloto_venc_id')->references('id')->on('drivers');
            $table->unsignedBigInteger('piloto_pole_id');
            $table->foreign('piloto_pole_id')->references('id')->on('drivers');
            $table->unsignedBigInteger('pista_id');
            $table->foreign('pista_id')->references('id')->on('tracks');

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
        Schema::dropIfExists('campeonato');
    }
}
