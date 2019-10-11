<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Campeonato extends Model
{
    protected $table = 'campeonato';

    protected $fillable = [
        'id', 'piloto_venc_id', 'piloto_pole_id', 'pista_id'
    ];

    public function corrida(){
        return $this->hasMany('App\Race', 'id');
    }

    public function piloto(){
        return $this->hasMany('App\Driver', 'id');
    }
}
