<?php

namespace App\Http\Controllers;

use App\Campeonato;
use App\Season;
use App\Track;
use App\Driver;
use App\Team;
use App\ScoreDriver;
use App\ScoreTeam;
use Illuminate\Http\Request;

class CampeonatoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($idSeason)
    {
        $rows = Campeonato::where('season_id', '=', $idSeason)->get()->count();
        $pilotos = Driver::get();
        $teams = Team::get();

        if($rows == 0){
            for($i=0; $i<21; $i++){
                Campeonato::insert([
                    'season_id' => $idSeason,
                    'piloto_venc_id' => null,
                    'piloto_pole_id' => null,
                    'pista_id' => $i+1,
                    'created_at' =>  now(),
                    'updated_at' => now()
                ]);
            }

            foreach ($pilotos as $piloto) {
                ScoreDriver::insert([
                    'season_id' => $idSeason,
                    'piloto_id' => $piloto->id,
                    'pontos' => 0,
                    'created_at' =>  now(),
                    'updated_at' => now()
                ]);
            }

            foreach ($teams as $team) {
                ScoreTeam::insert([
                    'season_id' => $idSeason,
                    'equipe_id' => $team->id,
                    'pontos' => 0,
                    'created_at' =>  now(),
                    'updated_at' => now()
                ]);
            }
        }

        //TABELA DE CONDUTORES
        $classDrivers = ScoreDriver::orderby('pontos','desc')
                                   ->where('season_id', '=', $idSeason)->get();

        //TABELA DE CONSTRUTORES
        $classTeams = ScoreTeam::orderby('pontos','desc')
                               ->where('season_id', '=', $idSeason)->get();
        $idClass = 1;

        // $racesFinish = Campeonato::orderby('id')->where('season_id', '=', $idSeason)
        //                                         ->where('terminado', '=', TRUE)->get()->count();

        $contId = 0;
        $campeonatos = Campeonato::orderby('id')->where('season_id', '=', $idSeason)
                                                ->where('terminado', '=', TRUE)->get();
        $racesFinish = $campeonatos->count();

        $percCampeonato = 0;
        $totalPistas = Track::get()->count();

        if($racesFinish == $totalPistas){
            $campeao = ScoreDriver::orderby('pontos','desc')
                                  ->where('season_id', '=', $idSeason)->get()->first();
            Season::where('id', '=', $idSeason)->update(['piloto_venc_id' => $campeao->piloto_id]);

            $construtor = ScoreTeam::orderby('pontos','desc')
                                   ->where('season_id', '=', $idSeason)->get()->first();
            Season::where('id', '=', $idSeason)->update(['construtor_id' => $construtor->equipe_id]);

            $vice = ScoreDriver::orderby('pontos','desc')
                                  ->where('season_id', '=', $idSeason)->get()->skip(1)->first();
            Season::where('id', '=', $idSeason)->update(['piloto_vice_id' => $vice->piloto_id]);

            $terceiro = ScoreDriver::orderby('pontos','desc')
                                  ->where('season_id', '=', $idSeason)->get()->skip(2)->first();
            Season::where('id', '=', $idSeason)->update(['piloto_terc_id' => $terceiro->piloto_id]);
        }

        return view('campeonatos.index', compact('campeonatos', 'contId', 'idSeason',
                                                 'racesFinish', 'percCampeonato', 'totalPistas',
                                                 'classDrivers', 'classTeams', 'idClass', 'pilotos', 'teams'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($idSeason, $idTrack)
    {
        $pista = $idTrack;
        $track = Track::where('id', '=', $pista)->get()->first();
        return view('campeonatos.create', compact('idSeason','track'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $id = Campeonato::count();
        if($id == 0){
            echo "É zero!";
        }
        // $campeonatos = Campeonato::orderby('id')->get();
        // return view('races.index', compact('campeonatos'));
        return redirect()->route('races.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Campeonato  $campeonato
     * @return \Illuminate\Http\Response
     */
    public function show(Campeonato $campeonato)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Campeonato  $campeonato
     * @return \Illuminate\Http\Response
     */
    public function edit(Campeonato $campeonato)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Campeonato  $campeonato
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Campeonato $campeonato)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Campeonato  $campeonato
     * @return \Illuminate\Http\Response
     */
    public function destroy(Campeonato $campeonato)
    {
        //
    }
}
