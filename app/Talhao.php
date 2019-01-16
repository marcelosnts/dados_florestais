<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Talhao extends Model
{
    protected $table = 'talhoes';

    public $timestamps = false; 
    
    protected $fillable = array('cod', 'area', 'descricao', 'data_plantio', 'estrato_id', 'nome_arquivo');

    public function estrato(){
        return $this->belongsTo('App\Estrato');
    }
    public function parcela(){
        return $this->hasMany('App\Parcela');
    }
}
