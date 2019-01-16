<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Estrato;
use App\Talhao;
use App\Parcela;
use App\Especie;

class WSController extends Controller
{
    public function readData(){
        $data = Estrato::all();

        foreach($data as $d){
            $d['talhao'] = Talhao::all()->where('estrato_id', $d['id']);
            foreach($d['talhao'] as $t){
                $t['parcela'] = Parcela::join('especies', 'parcelas.especie_id', '=', 'especies.id')->select('parcelas.*', 'especies.nome')->where('talhao_id', $t['id'])->get();
            }
        }
        
        return json_encode($data);
    }
    public function readTables(){
        $data['estratos'] = Estrato::all();
        $data['talhoes'] = Talhao::all();
        $data['parcelas'] = Parcela::all();
        $data['especies'] = Especie::all();
        
        return json_encode($data);
    }   
}
