<?php

namespace App\Http\Middleware;

use Closure;

class RolAdministrador
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next){
        //validando si el rol del usuario es Administrador para asi mostrar la pagina
        if ($request->user()->hasRole('Administrador')) {
            return $next($request);
        }
        else{ //mostrando la pagina de error en caso no tenga rol de Administrador
            abort(403, 'No tienes autorización para ingresar');
        }
    }
}
