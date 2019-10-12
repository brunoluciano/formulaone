<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Season extends Model
{
    protected $table = 'seasons';

    protected $fillable = [
        'id', 'piloto_venc_id', 'piloto_vice_id', 'piloto_terc_id'
    ];

    public function campeonato()
    {
        return $this->hasMany('App\Campeonato');
    }

    public function piloto()
    {
        return $this->hasMany('App\Driver');
    }
}
