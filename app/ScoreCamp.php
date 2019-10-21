<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ScoreCamp extends Model
{
    protected $table = 'score_camp';

    protected $fillable = [
        'id', 'season_id', 'scorecamp_id', 'track_id', 'posicao', 'piloto', 'pista'
    ];

    public function piloto()
    {
        return $this->hasMany('App\Driver', 'id');
    }

    public function pista()
    {
        return $this->hasMany('App\Track');
    }
}
