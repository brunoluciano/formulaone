<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Track extends Model
{
    protected $fillable = [
        'id', 'nome', 'curvas', 'distancia', 'last_win_id','image_circuito', 'pais_id'
    ];

    public function pais()
    {
        return $this->belongsTo('App\Country');
    }

    public function piloto()
    {
        return $this->hasMany('App\Driver');
    }
}
