<?php

namespace App\Http\Controllers;

use App\Race;
use App\Driver;
use App\Team;
use App\Campeonato;
use App\Track;
use App\ScoreDriver;
use App\ScoreTeam;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\VarDumper\VarDumper;
use Illuminate\Support\Arr;

class RaceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($idSeason, $idTrack)
    {
        $drivers = Driver::orderby('id')->get();
        $teams = Team::orderby('id')->get();

        $driverRdm = [];
        $cont = 0;
        foreach ($drivers as $d) { // PASSA PARA UM VETOR TODOS OS IDs DOS PILOTOS REGISTRADOS
            $driverRdm[$cont] = $d->id;
            $cont++;
        }

        $driverRdm = Arr::shuffle($driverRdm); // EMBARALHA OS PILOTOS DO ARRAY

        $id = 1;
        $pontos = [25,18,15,12,10,8,6,4,2,1,0,0,0,0,0,0,0,0,0,0]; // VETOR DE PONTUAÇÃO DE ACORDO COM A POSIÇÃO

        $row = Race::where('campeonato_id', '=', $idSeason)
                   ->where('track_id', '=', $idTrack)->get()->count(); //CONTA QUANTOS LINHAS JÁ FORAM CADASTRADAS NESSA CORRIDA

        if($row <= 0){ // TESTE PARA VERIFICAR SE JÁ FOI REALIZADO ALGUMA CORRIDA
            foreach ($drivers as $driver) { // GERA O VETOR DO GRID FINAL
                $grid[] = [
                    //'id' => $id,
                    'piloto_id' => $driverRdm[$id-1],
                    'campeonato_id' => $idSeason,
                    'track_id' => $idTrack,
                    'pontos' => $pontos[$id-1],
                    'terminado' => TRUE,
                    'created_at' =>  now(),
                    'updated_at' => now()
                ];
                Campeonato::where('pista_id', '=', $idTrack)
                          ->where('season_id', '=', $idSeason)
                          ->update(['terminado' => TRUE]);
                $id++;
            }
            Race::insert($grid); // INSERE NO BANCO DE DADOS O GRID FINAL

            foreach ($drivers as $driver) {
                $smPonto = Race::where([
                    ['campeonato_id', '=', $idSeason],
                    ['track_id', '=', $idTrack],
                    ['piloto_id', '=', $driver->id]
                ])->get();
                foreach ($smPonto as $key) {
                    ScoreDriver::where('season_id', '=', $idSeason)
                               ->where('piloto_id', '=', $driver->id)
                               ->increment('pontos', $key->pontos);
                }
            }

            foreach ($teams as $team) {
                foreach ($drivers as $driver) {
                    if($team->id == $driver->equipe_id){
                        $smPonto = Race::where([
                            ['campeonato_id', '=', $idSeason],
                            ['track_id', '=', $idTrack],
                            ['piloto_id', '=', $driver->id]
                        ])->get();
                        foreach ($smPonto as $key) {
                            ScoreTeam::where('season_id', '=', $idSeason)
                                       ->where('equipe_id', '=', $team->id)
                                       ->increment('pontos', $key->pontos);
                        }
                    }
                }
            }
        }


        $pilotoVencedor = Race::orderby('id')->where('campeonato_id', '=', $idSeason)
                              ->where('track_id', '=', $idTrack)->get()->first(); // PEGA O PILOTO VENCEDOR DA CORRIDA
        $rdmPilotoPole = Race::inRandomOrder()->first(); // PEGA ALEATORIAMENTE UM PILOTO QUE FEZ A POLE POSITION

        $campPilotos = Campeonato::where('pista_id', '=', $idTrack)->where('season_id', '=', $idSeason)->get()->first();

        if($campPilotos->piloto_venc_id == null){
            Campeonato::where('pista_id', '=', $idTrack)->update(['piloto_venc_id' => $pilotoVencedor->piloto_id]); // ATUALIZA A CORRIDA COM O RESPECTIVO PILOTO VENCEDOR
        }

        if($campPilotos->piloto_pole_id == null) {
            Campeonato::where('pista_id', '=', $idTrack)->update(['piloto_pole_id' => $rdmPilotoPole->piloto_id]);
        }

        $pista = Track::where('id', '=', $idTrack)->get()->first();

        //print_r($driverRdm);
        $contGrid = 0; // VARIÁVEL AUXILIAR PARA CONTAGEM DAS POSIÇÕES NA VIEW

        $races = Race::orderby('id')->where('campeonato_id', '=', $idSeason)
                                    ->where('track_id', '=', $idTrack)->get();

        return view('races.index', compact('races', 'drivers', 'contGrid', 'idSeason', 'pista'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Race  $race
     * @return \Illuminate\Http\Response
     */
    public function show(Race $race)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Race  $race
     * @return \Illuminate\Http\Response
     */
    public function edit(Race $race)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Race  $race
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Race $race)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Race  $race
     * @return \Illuminate\Http\Response
     */
    public function destroy(Race $race)
    {
        //
    }
}
