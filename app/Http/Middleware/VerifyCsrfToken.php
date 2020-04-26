<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
        // 'login' //para exlcuir la verificacion del token crf del formulario de login y que la sesion no expire al estar en esta URI. Esto no es aconsejable por seguridad
    ];
}
