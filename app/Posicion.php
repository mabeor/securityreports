<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Posicion extends Model
{
    protected $table = 'Posiciones';
    protected $guarded = []; //ningun campo se debe de dejar de llenar
}
