<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ScoreTeam extends Model
{
    protected $table = 'score_teams';

    protected $fillable = [
        'id', 'season_id', 'equipe_id', 'vitorias', 'pontos'
    ];

    public function equipe()
    {
        return $this->hasMany('App\Team', 'id');
    }
}
