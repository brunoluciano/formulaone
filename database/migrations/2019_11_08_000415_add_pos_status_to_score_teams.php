<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPosStatusToScoreTeams extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('score_teams', function (Blueprint $table) {
            $table->integer('posAtual')->nullable()->default(NULL)->after('vitorias');
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
        Schema::table('score_teams', function (Blueprint $table) {
            //
        });
    }
}
