<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inconsistencia extends Model
{
    protected $table = 'Inconsistencias_de_libros';
    protected $guarded = []; //ningun campo se debe de dejar de llenar
}
