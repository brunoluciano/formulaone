<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateScoreCampTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('score_camp', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedBigInteger('season_id');
            $table->foreign('season_id')->references('id')->on('seasons')->onDelete('cascade');

            $table->unsignedBigInteger('piloto_id');
            $table->foreign('piloto_id')->references('id')->on('drivers');

            $table->unsignedBigInteger('track_id');
            $table->foreign('track_id')->references('id')->on('tracks')->onDelete('cascade');

            $table->integer('posicao')->nullable()->default(NULL);
            $table->bigInteger('pontos')->default(0);

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
        Schema::dropIfExists('score_camp');
    }
}
