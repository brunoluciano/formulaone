<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Track extends Model
{
    protected $fillable = [
        'id', 'nome', 'curvas', 'image_circuito', 'pais_id'
    ];

    public function pais()
    {
        return $this->belongsTo('App\Country');
    }
}
