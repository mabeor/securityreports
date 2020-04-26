<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateInconsistenciasRequest extends FormRequest
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
            'Posicion' => 'required', //no se le pone cant maxima de caracteres por ser un select
            'Fecha.*' => 'required|date',
            'Descripcion.*' => 'required|string|max:1500',
        ];
    }

    public function messages(){
        return [
            'Posicion.required' => 'El campo "Posicion" es requerido.',
            'Fecha*.required' => 'El campo "Fecha" es requerido.',
            'Fecha*.date' => 'El campo "Fecha" debe poseer un formato correcto de fecha.',
            'Descripcion*.required' => 'El campo "Detalle de la inconsistencia" es requerido.',
            'Descripcion*.string' => 'El campo "Detalle de la inconsistencia" debe contener una cadena de caracteres.',
            'Descripcion*.max' => 'El campo "Detalle de la inconsistencia" debe contener maximo 1500 caracteres.',
        ];
    }
}
