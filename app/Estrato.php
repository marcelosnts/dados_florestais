<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estrato extends Model
{
    public $timestamps = false; 
    
    protected $fillable = array('cod', 'descricao', 'area');

    public function talhao(){
        return $this->hasMany('App\Talhao');
    }
}
