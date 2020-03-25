<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cierre extends Model
{
	//Definiendo la tabla de cierres de cuenta
    protected $table = 'Cierres_de_cuenta';
    protected $guarded = [];
}
