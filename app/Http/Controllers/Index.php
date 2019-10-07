<?php

namespace App\Http\Controllers;

use App\Team;
use Illuminate\Http\Request;

class Index extends Controller
{
    public function index()
    {
        $teams = Team::orderby('id')->get();
        return view('app', compact('teams'));
    }
}
