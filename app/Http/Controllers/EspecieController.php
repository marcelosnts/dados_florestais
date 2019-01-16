<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Especie;

use App\Http\Requests\EspecieRequest;

class EspecieController extends Controller
{
    public function novaEspecie(){
    	$especies = Especie::all();

        return view('novaEspecie', compact('especies'));
    }
    public function visualizarEspecie($id){
        $especies = Especie::all();
        $especie = Especie::find($id);
        $visualizar = $id;

        return view('novaEspecie', compact('especies', 'visualizar', 'especie'));
    }

    public function salvarEspecie(EspecieRequest $request){
        $formulario = $request->all();

        if($formulario['id'] ==  ''){
            Especie::create($formulario);
        }else{
            Especie::find($formulario['id'])->update($formulario);    
        }

        return redirect('/especie');
    }

    public function buscarEspecie($id){
        $especies = Especie::all();
        $especie = Especie::find($id);

        return view('novaEspecie', compact('especies', 'especie'));
    }

    public function deletarEspecie($id){
        $especie = Especie::find($id);
        $especie->delete();

        return redirect('/especie');
    }
}
