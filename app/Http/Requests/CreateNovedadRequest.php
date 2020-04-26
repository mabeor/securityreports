<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateNovedadRequest extends FormRequest
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
            'Edificio' => 'required', //no se le pone cant maxima de caracteres por ser un select
            'Tipo' => 'required', //no se le pone cant maxima de caracteres por ser un select
            'Fecha.*' => 'required|date',
            'Descripcion.*' => 'required|string|max:1500',
        ];
    }

    public function messages(){
        return [
            'Edificio.required' => 'El campo "Edificio" es requerido.',
            'Tipo.required' => 'El campo "Tipo" es requerido.',
            'Fecha*.required' => 'El campo "Fecha novedad" es requerido.',
            'Fecha*.date' => 'El campo "Fecha novedad" debe poseer un formato correcto de fecha.',
            'Descripcion*.required' => 'El campo "Descripcion" es requerido.',
            'Descripcion*.string' => 'El campo "Descripcion" debe contener una cadena de caracteres.',
            'Descripcion*.max' => 'El campo "descripcion" debe contener maximo 1500 caracteres.',
        ];
    }
}
