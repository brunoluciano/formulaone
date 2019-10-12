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
        $totalPistas = Track::get()->count();
        $campeonatos = Campeonato::get();
        $drivers = Driver::get();
        $teams = Team::get();

        $finishCamp = 0;
        $percConcluida = 0;

        //$seasonsFinished = Campeonato::where('terminado', '=', TRUE)->get()->count();
        $seasonsUnfinished = Campeonato::where('terminado', '=', FALSE)->get()->count();
        if($seasonsUnfinished > 0){
            $realizandoTemporada = TRUE;
        } else {
            $realizandoTemporada = FALSE;
        }

        $seasons = Season::orderby('id', 'desc')->get();
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
