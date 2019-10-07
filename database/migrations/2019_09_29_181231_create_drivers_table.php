<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDriversTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('drivers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nome');
            $table->bigInteger('numero_carro');
            $table->bigInteger('titulos')->default(0);
            $table->bigInteger('vitorias')->default(0);
            $table->bigInteger('podios')->default(0);
            $table->bigInteger('pole_positions')->default(0);

            // Foreign Keys
            $table->unsignedBigInteger('equipe_id');
            $table->foreign('equipe_id')->references('id')->on('teams');
            $table->unsignedBigInteger('pais_id');
            $table->foreign('pais_id')->references('id')->on('countries');

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
        Schema::dropIfExists('drivers');
    }
}
