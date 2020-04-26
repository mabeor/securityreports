<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MostrarAperturasCierresRequest extends FormRequest
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
            'Edificio' => 'nullable', //el campo Edificio no es requerido para la busqueda
            'Cuenta' => 'nullable', //el campo Cuenta no es requerido para la busqueda
            'Fecha_desde' => 'required', //el campo Fecha desde si es requerido
            'Fecha_hasta' => 'required|after_or_equal:Fecha_desde', //el campo Fecha hasta si es requerido y la fecha tiene que ser despues de la 'fecha desde'
        ];
    }
    public function messages(){
        return [
            'Fecha_desde.required' => 'El campo "Fecha desde" es requerido para realizar la busqueda.',
            'Fecha_hasta.required' => 'El campo "Fecha hasta" es requerido para realizar la busqueda.',
            'Fecha_hasta.after' => 'El campo "Fecha hasta" debe ser una fecha posterior al campo "Fecha desde".',
        ];
    }
}
