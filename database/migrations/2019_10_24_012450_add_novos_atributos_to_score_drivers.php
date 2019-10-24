<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddNovosAtributosToScoreDrivers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('score_drivers', function (Blueprint $table) {
            $table->bigInteger('vitorias')->default(0)->after('piloto_id');
            $table->bigInteger('podios')->default(0)->after('vitorias');
            $table->bigInteger('pole_positions')->default(0)->after('podios');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('score_drivers', function (Blueprint $table) {
            //
        });
    }
}
