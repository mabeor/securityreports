<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cuenta extends Model
{
	//Definiendo la tabla de Cuentas/Campanas
    protected $table = 'Cuentas';
    protected $guarded = [];
}