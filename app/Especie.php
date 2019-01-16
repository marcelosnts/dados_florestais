<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Especie extends Model
{
    public $timestamps = false; 
    
    protected $fillable = array('nome', 'nome_cientifico');
    
    public function parcela(){
        return $this->hasOne('App\Parcela');
    }
}
