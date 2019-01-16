<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Parcela extends Model
{
    public $timestamps = false; 
    
    protected $fillable = array('descricao', 'area', 'declividade', 'largura', 'comprimento', 'latitude', 'longitude', 'formato', 'talhao_id', 'especie_id');

    public function especie(){
        return $this->belongsTo('App\Especie');
    }
    public function talhao(){
        return $this->belongsTo('App\Talhao');
    }
}
