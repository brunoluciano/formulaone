<?php

namespace App\Http\Controllers;

use App\Team;
use App\Country;
use App\Driver;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teams = Team::orderby('id')->get();
        return view('teams.index', compact('teams'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $teams = Team::orderby('id')->get();
        $paises = Country::orderby('nome_pt')->get();
        //return view('teams.create', ['teams' => $teams], ['pais' => $pais]);
        return view('teams.create', compact('teams', 'paises'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required',
            'diretor' => 'required',
            'cor' => 'required',
            'pais_id' => 'required'
        ]);

        $data = $request->only(['nome','diretor', 'cor', 'pais_id']);
        Team::create($data);

        return redirect()->route('teams.index')->with('success','Equipe inserida com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function show(Team $team)
    {
        $driver = Driver::orderby('nome')->get();
        $cont = 0;
        return view('teams.show', compact('team', 'driver', 'cont'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function edit(Team $team)
    {
        $paises = Country::orderby('nome_pt')->get();
        return view('teams.edit', compact('team', 'paises'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Team $team)
    {
        $request->validate([
            'nome' => 'required',
            'diretor' => 'required',
            'cor' => 'required',
            'pais_id' => 'required'
        ]);

        $team->update($request->all());

        return redirect()->route('teams.index')->with('success', 'Equipe atualizada com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function destroy(Team $team)
    {
        $team->delete();

        return redirect()->route('teams.index')->with('success', 'Equipe removida com sucesso!');
    }
}
