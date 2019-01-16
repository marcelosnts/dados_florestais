<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Estrato;
use App\Talhao;

use App\Http\Requests\EstratoRequest;
use App\Http\Requests\TalhaoRequest;

class TalhaoController extends Controller
{
    public function novoTalhao($estratoId){
        $estratos = Estrato::all();
        $talhoes = Talhao::all()->where('estrato_id', $estratoId);
        $estrato = Estrato::find($estratoId);
        //return $talhoes;
        //$estratoId = $estratoId;

        return view('novoTalhao', compact('estratos', 'talhoes', 'estrato'));
    }
    public function visualizarTalhao($id){
        $estratos = Estrato::all();
        $talhao = Talhao::find($id);
        $talhoes = Talhao::all()->where('estrato_id', $talhao['estrato_id']);
        $estrato = Estrato::find($talhao['estrato_id']);
        $visualizar = $id;
        return view('novoTalhao', compact('estratos', 'talhoes', 'visualizar', 'talhao', 'estrato'));
    }
    
    /*CRUD TALHÃO*/

    public function salvarTalhao(TalhaoRequest $request){
        $formulario = $request->all();
        
        if($formulario['talhao_kml'] == '')
            $formulario['nome_arquivo'] = '';
        
        if(\Input::file('kml')){
            $fileName = TalhaoController::uploadKml();
            $formulario['nome_arquivo'] = $fileName;
        }

        if($formulario['id'] == ''){
            Talhao::create($formulario);
            //return "Teste " . $formulario['estrato_id'];
            //return redirect('/talhao/' . $formulario['estrato_id']);
        }else{
            Talhao::find($formulario['id'])->update($formulario);
            //return redirect('/talhao/editar/'. $formulario['id']);
        }
        return redirect('/talhao/' . $formulario['estrato_id']);
    }

    public function buscarTalhao($id){
        $talhao = Talhao::find($id);
        $estratos = Estrato::all();
        $estrato = Estrato::find($talhao['estrato_id']);
        $talhoes = Talhao::all()->where('estrato_id', $estrato['id']);

        return view('novoTalhao', compact('talhao', 'estratos', 'talhoes', 'estrato'));
    }

    public function deletarTalhao($id){        
        $talhao = Talhao::find($id);
        $estratoId = $talhao['estrato_id'];

        try{
            unlink(getcwd() . '/upload/' . $talhao['nome_arquivo']);
            $talhao->delete();

        }catch(\Exception $e){
            if($talhao['nome_arquivo'] == ''){
                $talhao->delete();
            }else{
                return 'erro ao deletar';
            }
        };

        /*if(unlink('upload/99999') || $talhao['nome_arquivo'] == ''){
            $talhao->delete();
        }else{
            return 'erro ao deletar';
        }*/

        return redirect('/talhao/'. $estratoId);
    }

    /*FIM CRUD TALHÃO*/

    public function uploadKml(){
        $file = \Input::file('kml');

        \Input::hasFile('kml');

        $destinationPath = public_path().DIRECTORY_SEPARATOR.'upload';
        $fileName = rand(11111, 99999);

        $file->move($destinationPath, $fileName);

        return $fileName;
    }

    public function removerKml($id, $arquivo){
        unlink(getcwd() . '/upload/' . $arquivo);
        //return getcwd() . '/upload/' . $arquivo;
        $formulario['nome_arquivo'] = '';
        //$request = new TalhaoRequest();
        //TalhaoController::salvarTalhao($request);

        Talhao::find($id)->update($formulario);

        return redirect('/talhao/editar/' . $id);
    }
}

/*public function readTalhoes(){
    $talhoes = Talhao::all();

    return view('listaTalhoes', compact('talhoes'));
}*/
/*public function updateTalhao(TalhaoRequest $request){
    $formulario = $request->all();
    
    if(\Input::file('kml')){
        $fileName = TalhaoController::uploadKml();
        $formulario['nome_arquivo'] = $fileName;
    }
    
    Talhao::find($formulario['id'])->update($formulario);
    
    return redirect('/');
}*/