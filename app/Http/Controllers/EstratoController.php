<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Estrato;
use App\Http\Requests\EstratoRequest;

class EstratoController extends Controller
{
    public function novoEstrato(){
    	$estratos = Estrato::all();
        
        return view('novoEstrato', compact('estratos'));
    }
    public function visualizarEstrato($id){
        $estratos = Estrato::all();
        $estrato = Estrato::find($id);
        $visualizar = null;

        if($id != null){
            $visualizar = $id;
        }

        return view('novoEstrato', compact('estratos', 'visualizar', 'estrato'));
    }

    /*CRUD ESTRATO*/

    public function salvarEstrato(EstratoRequest $request){
        $formulario = $request->all();

        if($formulario['id'] == ''){    
            Estrato::create($formulario);
        }else{
            Estrato::find($formulario['id'])->update($formulario);
        }
        
        return redirect('/estrato');
    }
    public function buscarEstrato($id){
        $estrato = Estrato::find($id);
        $estratos = Estrato::all();

        return view('novoEstrato', compact('estrato', 'estratos'));
    }
    public function deletarEstrato($id){
        $estrato  = Estrato::find($id);
        $estrato->delete();

        return redirect('/estrato');
    }

    /*FIM CRUD ESTRATO*/
}
