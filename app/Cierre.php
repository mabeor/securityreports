<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity; //agregado para que funcione el log activity


class Cierre extends Model
{
	use LogsActivity;

	//Definiendo la tabla de cierres de cuenta
    protected $table = 'Cierres_de_cuenta';
    protected $guarded = [];
}
