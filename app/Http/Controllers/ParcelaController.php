<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Talhao;
use App\Especie;
use App\Parcela;

use App\Http\Requests\TalhaoRequest;
use App\Http\Requests\EspecieRequest;
use App\Http\Requests\ParcelaRequest;

class ParcelaController extends Controller
{
    public function novaParcela($talhaoId){
        $talhoes = Talhao::all();
        $especies = Especie::all();
        
        $talhao = Talhao::find($talhaoId);

        $parcelas = Parcela::all();
        $parcelas = Parcela::with('talhao')->get()->where('talhao_id', $talhaoId);

    	return view('novaParcela', compact('talhoes', 'especies', 'parcelas', 'talhao'));
    }
    public function visualizarParcela($id){
        $talhoes = Talhao::all();
        $parcelas = Parcela::all();
        $especies = Especie::all();

        $parcela = Parcela::find($id);
        $parcelas = Parcela::with('talhao')->get()->where('talhao_id', $parcela['talhao_id']);
        
        $talhao = Talhao::find($parcela['talhao_id']);
        $visualizar = null;

        if($id != null){
            $visualizar = $id;
        }

        return view('novaParcela', compact('talhoes', 'parcelas', 'visualizar', 'especies', 'talhao', 'parcela'));
    }
    
    /*CRUD PARCELA*/
    
    public function salvarParcela($talhaoId, ParcelaRequest $request){
        $formulario = $request->all();

        if($formulario['id'] == ''){
            Parcela::create($formulario);
            //return redirect('/parcela/' . $talhaoId);
        }else{
            Parcela::find($formulario['id'])->update($formulario);
            //return redirect('/parcela/editar/' . $formulario['id']);
        }
        return redirect('/parcela/' . $talhaoId);
    }
    public function buscarParcela($id){
        $talhoes = Talhao::all();
        $especies = Especie::all();
        $parcela = Parcela::find($id);
        $talhao = Talhao::find($parcela['talhao_id']);
        $parcelas = Parcela::all()->where('talhao_id', $talhao['id']);

        return view('novaParcela', compact('talhoes', 'especies', 'parcela', 'parcelas', 'talhao'));
    }

    public function deletarParcela($id){
        $parcela = Parcela::find($id);
        $talhaoId = $parcela['talhao_id'];

        $parcela->delete();

        return redirect('/parcela/' . $talhaoId);
    }

    public function detalhesParcela($id){
        $parcela = Parcela::find($id);

        //return json_encode($parcela->talhao());

        return view('detalhesParcela', compact('parcela'));
    }

    /*FIM CRUD PARCELA*/
}
