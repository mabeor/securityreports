<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateAperturaCierreRequest extends FormRequest
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
            'Edificio' => 'required',
            'Cuenta' => 'required',
            'Hora.*' => 'required|date',
        ];
    }

     public function messages(){
        return [
            'Edificio.required' => 'El campo "Edificio" es requerido.',
            'Cuenta.required' => 'El campo "Cuenta" es requerido.',
            'Hora*.required' => 'El campo "Hora apertura" es requerido.',
            'Hora*.date_format' => 'El campo "Hora apertura" debe tener el formato hh:mm.',
            ];
    }
}
