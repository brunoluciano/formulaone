<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPosStatusToScoreDrivers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('score_drivers', function (Blueprint $table) {
            $table->integer('posAtual')->nullable()->default(NULL)->after('pole_positions');
            $table->integer('posAnt')->nullable()->default(0)->after('posAtual');
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
