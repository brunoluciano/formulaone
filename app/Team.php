<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    protected $table = 'teams';

    protected $fillable = [
        'id', 'nome', 'diretor', 'pais_id', 'podios', 'titulos', 'cor'
    ];

    public function pais()
    {
        return $this->belongsTo('App\Country');
    }

    public function piloto()
    {
        return $this->hasMany(\App\Driver::class, 'id');
    }
}
