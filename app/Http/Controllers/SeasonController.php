<?php

namespace App\Http\Controllers;

use App\Season;
use App\Campeonato;
use App\Track;
use App\Driver;
use App\Team;
use Illuminate\Http\Request;

class SeasonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $seasons = Season::orderby('id', 'desc')->get();
        $totalPistas = Track::get()->count();
        $campeonatos = Campeonato::get();
        $drivers = Driver::get();
        $teams = Team::get();

        foreach ($drivers as $driver) { //DEFININDO A QUANTIDADE DE TÍTULOS CONQUISTADOS PELOS PILOTOS. ESSA DADO SERÁ MOSTRADO NAS INFORMAÇÕES DO PILOTO
            $cont = 0; // VARIÁVEL UTILIZADA PARA ARMAZENAR A QUANTIDADE DE TÍTULOS DO RESPECTIVO PILOTO
            foreach ($seasons as $titulo) {
                if($driver->id == $titulo->piloto_venc_id){
                    $cont++;
                }
            }
            Driver::where('id','=',$driver->id)->update(['titulos' => $cont]);
        }

        foreach ($teams as $team) { //DEFININDO A QUANTIDADE DE TÍTULOS CONQUISTADOS PELAS EQUIPES. ESSA DADO SERÁ MOSTRADO NAS INFORMAÇÕES DA EQUIPE
            $cont = 0; // VARIÁVEL UTILIZADA PARA ARMAZENAR A QUANTIDADE DE TÍTULOS DA RESPECTIVA EQUIPE
            foreach ($seasons as $titulo) {
                if($team->id == $titulo->construtor_id){
                    $cont++;
                }
            }
            Team::where('id','=',$team->id)->update(['titulos' => $cont]);
        }

        $finishCamp = 0;
        $percConcluida = 0;

        //$seasonsFinished = Campeonato::where('terminado', '=', TRUE)->get()->count();
        $seasonsUnfinished = Campeonato::where('terminado', '=', FALSE)->get()->count();
        if($seasonsUnfinished > 0){
            $realizandoTemporada = TRUE;
        } else {
            $realizandoTemporada = FALSE;
        }

        return view('seasons.index', compact('seasons', 'campeonatos', 'totalPistas',
                                             'finishCamp', 'percConcluida', 'realizandoTemporada',
                                            'drivers', 'teams'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('seasons.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $idTemp = Season::insertGetId(
            [
             'piloto_venc_id' => null,
             'piloto_vice_id' => null,
             'piloto_terc_id' => null,
             'created_at' =>  now(),
             'updated_at' => now()
            ]
        );

        // $seasons = Season::orderby('id')->get();
        // return view('seasons.index', compact('seasons'));
        return redirect()->route('seasons.index', $idTemp);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Season  $season
     * @return \Illuminate\Http\Response
     */
    public function show(Season $season)
    {
        return view('campeonatos.index', compact('season'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Season  $season
     * @return \Illuminate\Http\Response
     */
    public function edit(Season $season)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Season  $season
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Season $season)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Season  $season
     * @return \Illuminate\Http\Response
     */
    public function destroy(Season $season)
    {
        //
    }
}
