<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreatePrestamosGafetesRequest extends FormRequest
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
            'Cuenta' => 'required',
            'TipoGafete' => 'required',
            'NumeroGafete.*' => 'integer|min:1|max:99',
            'NombreVisita.*' => 'string|max:50',
            'NombreQuienRecibio.*' => 'string|max:50',
            'FechaInicio.*' => 'required|date',
            'FechaFin.*' => 'required|date|after_or_equal:FechaInicio.*',
        ];
    }

    public function messages(){
        return [
            'Cuenta.required' => 'El campo "Cuenta" es requerido.',
            'TipoGafete.required' => 'El campo "Tipo gafete" es requerido.',
            'NumeroGafete*.integer' => 'El campo "No. gafete" debe contener numeros.',
            'NumeroGafete*.min' => 'El campo "No. gafete" debe contener un numero entre 1 y 99.',
            'NumeroGafete*.max' => 'El campo "No. gafete" debe contener un numero entre 1 y 99.',
            'NombreVisita*.string' => 'El campo "Nombre visita" debe contener una cadena de caracteres.',
            'NombreVisita*.max' => 'El campo "Nombre visita" debe contener menos de 50 caracteres.',
            'NombreQuienRecibio*.string' => 'El campo "Nombre quien recibio" debe contener una cadena de caracteres.',
            'NombreQuienRecibio*.max' => 'El campo "Nombre quien recibio" debe contener menos de 50 caracteres.',
            'FechaInicio*.required' => 'El campo "Fecha inicio" es requerido.',
            'FechaInicio*.date' => 'El campo "Fecha inicio" debe contener un formato valido de fecha.',
            'FechaFin*.required' => 'El campo "Fecha fin" es requerido.',
            'FechaFin*.date' => 'El campo "Fecha fin" debe contener un formato valido de fecha.',
            'FechaFin*.after' => 'El campo "Fecha fin" debe ser una fecha posterior al campo "Fecha inicio".',
        ];
    }
}
