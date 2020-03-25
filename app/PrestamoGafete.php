<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PrestamoGafete extends Model
{
    //Definiendo la tabla de aperturas de cuenta
    protected $table = 'Prestamos_de_gafete_excepcion';
    protected $guarded = []; //ningun campo se debe de dejar de llenar
}
