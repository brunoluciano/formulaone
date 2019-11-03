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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/', function () {
    //return view('index.index');
    return view('home');
});

Route::get('/home', function () {
    //return view('index.index');
    return view('index.index');
});

Route::resource('countries', 'CountryController')->middleware('auth');
Route::resource('teams', 'TeamController')->middleware('auth');
Route::resource('drivers', 'DriverController')->middleware('auth');
Route::resource('tracks', 'TrackController')->middleware('auth');
Route::resource('index', 'Index')->middleware('auth');

Route::get('seasons/campeonatos/{idSeason}', 'CampeonatoController@index')->name('campeonatos.index')->middleware('auth');

Route::prefix('seasons/campeonatos/{idSeason}')->group(function () {
    Route::get('resultados', 'CampeonatoController@show')->name('campeonatos.show')->middleware('auth');
    Route::get('{idTrack}', 'CampeonatoController@create')->name('campeonatos.create')->middleware('auth');

    Route::get('race/{idTrack}', 'RaceController@index')->name('races.index')->middleware('auth');
    Route::get('race/{idTrack}/resultados', 'RaceController@show')->name('races.show')->middleware('auth');
});

Route::resource('seasons', 'SeasonController')->middleware('auth');
