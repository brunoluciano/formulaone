<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('index.index');
});

Route::resource('countries', 'CountryController');
Route::resource('teams', 'TeamController');
Route::resource('drivers', 'DriverController');
Route::resource('tracks', 'TrackController');
//Route::resource('seasons/campeonatos/races', 'RaceController');
Route::resource('index', 'Index');

//Route::resource('seasons/campeonatos', 'CampeonatoController');
Route::get('/seasons/campeonatos/{idSeason}', 'CampeonatoController@index')->name('campeonatos.index');
Route::get('/seasons/campeonatos/{idSeason}/{idTrack}', 'CampeonatoController@create')->name('campeonatos.create');

Route::get('/seasons/campeonatos/{idSeason}/race/{idTrack}', 'RaceController@index')->name('races.index');
Route::get('/seasons/campeonatos/{idSeason}/race/{idTrack}/resultados', 'RaceController@show')->name('races.show');

Route::resource('seasons', 'SeasonController');
