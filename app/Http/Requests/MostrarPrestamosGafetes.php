<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MostrarPrestamosGafetes extends FormRequest
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
            'Fecha_desde' => 'required',
            'Fecha_hasta' => 'required|after_or_equal:Fecha_desde',
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
