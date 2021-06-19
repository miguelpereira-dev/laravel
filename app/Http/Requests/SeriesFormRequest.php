<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SeriesFormRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'nome' => 'required|min:3',
        ];
    }
    
    public function messages()
    {
        return [
            'nome.required' => 'Digite o nome da série',
            'nome.min' => 'O nome da série deve ter pelo menos 3 caracteres'
        ];
    }
}
