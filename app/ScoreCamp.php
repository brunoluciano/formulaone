<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ScoreCamp extends Model
{
    protected $table = 'score_camp';

    protected $fillable = [
        'id', 'season_id', 'race_id', 'piloto_id', 'score_driver_id'
    ];
}
