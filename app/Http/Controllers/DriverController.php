<?php

namespace App\Http\Controllers;

use App\Driver;
use App\Team;
use App\Country;
use Illuminate\Http\Request;

class DriverController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $drivers = Driver::orderby('nome')->get();
        $teams = Team::orderby('nome')->get();
        return view('drivers.index', compact('drivers', 'teams'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $drivers = Driver::orderby('id')->get();
        $teams = Team::orderby('nome')->get();
        $countries = Country::orderby('nome_pt')->get();
        $cont = 0;
        return view('drivers.create', compact('drivers', 'teams', 'countries', 'cont'));
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
            'numero_carro' => 'required',
            'equipe_id' => 'required',
            'pais_id' => 'required'
        ]);

        $data = $request->only(['nome', 'numero_carro', 'equipe_id', 'pais_id']);
        Driver::create($data);

        return redirect()->route('drivers.index')->with('success','Piloto inserido com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Driver  $driver
     * @return \Illuminate\Http\Response
     */
    public function show(Driver $driver)
    {
        return view('drivers.show', compact('driver'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Driver  $driver
     * @return \Illuminate\Http\Response
     */
    public function edit(Driver $driver)
    {
        $drivers = Driver::orderby('id')->get();
        $teams = Team::orderby('nome')->get();
        $countries = Country::orderby('nome_pt')->get();
        return view('drivers.edit', compact('driver', 'teams', 'countries', 'drivers'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Driver  $driver
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Driver $driver)
    {
        $request->validate([
            'nome' => 'required',
            'numero_carro' => 'required',
            'equipe_id' => 'required',
            'pais_id' => 'required'
        ]);

        $driver->update($request->all());

        return redirect()->route('drivers.index')->with('success', 'Piloto atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Driver  $driver
     * @return \Illuminate\Http\Response
     */
    public function destroy(Driver $driver)
    {
        $driver->delete();

        return redirect()->route('drivers.index')->with('success', 'Piloto removido com sucesso!');
    }
}
