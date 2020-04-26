<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Novedad extends Model
{
    protected $table = 'Novedades';
    protected $guarded = []; //ningun campo se debe de dejar de llenar
}
