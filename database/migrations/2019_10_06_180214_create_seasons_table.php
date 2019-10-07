<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSeasonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seasons', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedBigInteger('piloto_venc_id')->nullable()->default(NULL);
            $table->foreign('piloto_venc_id')->references('id')->on('drivers');
            $table->unsignedBigInteger('piloto_vice_id')->nullable()->default(NULL);
            $table->foreign('piloto_vice_id')->references('id')->on('drivers');
            $table->unsignedBigInteger('piloto_terc_id')->nullable()->default(NULL);
            $table->foreign('piloto_terc_id')->references('id')->on('drivers');

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
        Schema::dropIfExists('seasons');
    }
}
