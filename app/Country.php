<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $table = 'countries';

    protected $fillable = ['id', 'nome', 'nome_pt', 'sigla', 'bacen', 'image'];

    public function equipe(){
        return $this->hasMany('App\Team');
    }
}
