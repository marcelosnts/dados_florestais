<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ParcelaRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'descricao' => 'required',
            'declividade' => 'required',
            'comprimento' => 'required',
            //'largura' => 'required',
            'latitude' => 'required',
            'longitude' => 'required',
            'area' => 'required',
        ];
    }
    public function messages(){
        return [
            'descricao.required' => 'Por favor preencha a Descrição.',
            'declividade.required' => 'Por favor preencha a Declividade',
            'comprimento.required' => 'Por favor preencha o Comprimento',
            'largura.required' => 'Por favor preencha o largura',
            'latitude.required' => 'Por favor preencha a Latitude',
            'longitude.required' => 'Por favor preencha a Longitude',
            'area.required' => 'Por favor preencha o Área',
        ];
    }
}
