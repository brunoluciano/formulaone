<?php

namespace App\Http\Controllers;

use App\Campeonato;
use App\Track;
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
        }
        $contId = 0;
        $campeonatos = Campeonato::orderby('id')->where('season_id', '=', $idSeason)->get();
        return view('campeonatos.index', compact('campeonatos', 'contId', 'idSeason'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        echo $id;
        $pista = 1;
        $track = Track::where('id', '=', $pista)->get()->first();
        return view('campeonatos.create', compact('track'));
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
