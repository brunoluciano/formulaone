<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Driver extends Model
{
    protected $fillable = [
        'id', 'nome', 'numero_carro', 'titulos', 'vitorias', 'podios', 'pole_positions', 'equipe_id', 'pais_id'
    ];

    public function equipe()
    {
        return $this->belongsTo('App\Team');
    }

    public function pais()
    {
        return $this->belongsTo('App\Country');
    }

    public function corrida()
    {
        return $this->belongsToMany('App\Race', 'races_drivers', 'driver_id', 'race_id');
    }
}
