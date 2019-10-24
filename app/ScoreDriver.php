<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ScoreDriver extends Model
{
    //protected $table = 'score_drivers';

    protected $fillable = [
        'id', 'season_id', 'race_id', 'piloto_id', 'vitorias', 'podios', 'pole_positions', 'pontos', 'piloto'
    ];

    public function piloto()
    {
        return $this->hasMany('App\Driver', 'id');
    }
}
