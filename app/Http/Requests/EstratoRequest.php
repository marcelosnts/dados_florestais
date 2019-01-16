<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EstratoRequest extends FormRequest
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
            'cod' => 'required',
            'descricao' => 'required',
            'area' => 'required',
        ];
    }
    public function messages(){
        return [
            'cod.required' => 'Por favor preencha o Código.',
            'descricao.required' => 'Por favor preencha a Descrição',
            'area.required' => 'Por favor preencha a Área',
        ];
    }
}
