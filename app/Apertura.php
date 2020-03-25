<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity; //agregado para que funcione el log activity

class Apertura extends Model
{
	use LogsActivity;
	// protected static $logAttributes = ['Creado_por']; //atributos a guardar en el activity log
	protected static $recordEvents = ['created'];
	protected static $logName = 'Aperturas de cuenta'; //nombre del tipo de log (campo log_name de la base de datos)
	public function getDescriptionForEvent(string $eventName): string
    {
        return "Aperturas de cuenta creadas";
    }
    //********** fin logactivity

	//Definiendo la tabla de aperturas de cuenta
    protected $table = 'Aperturas_de_cuenta';
    protected $guarded = []; //ningun campo se debe de dejar de llenar
}
