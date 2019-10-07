<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Race extends Model
{
    protected $table = 'races';

    protected $fillable = [
        'id', 'piloto_id', 'campeonato_id', 'pontos'
    ];

    public function piloto()
    {
        //return $this->belongsToMany('App\Driver', 'races_drivers', 'race_id', 'driver_id');
        return $this->hasMany(\App\Driver::class, 'id');
    }
}
