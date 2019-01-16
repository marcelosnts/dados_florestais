<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EspecieRequest extends FormRequest
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
            'nome' => 'required',
            'nome_cientifico' => 'required',
        ];
    }
    public function messages(){
        return [
            'nome.required' => 'Por favor preencha o Nome.',
            'nome_cientifico.required' => 'Por favor preencha o Nome Cientifico',
        ];
    }
}
