<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Apertura extends Model
{
	//Definiendo la tabla de aperturas de cuenta
    protected $table = 'Aperturas_de_cuenta';
    protected $guarded = []; //ningun campo se debe dejar de llenar
}
