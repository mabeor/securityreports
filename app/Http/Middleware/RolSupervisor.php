<?php

namespace App\Http\Middleware;

use Closure;

class RolSupervisor
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next){
        //validando si el rol del usuario es Supervisor o Administrador para asi mostrar la pagina
        if ($request->user()->hasRole('Supervisor') || $request->user()->hasRole('Administrador')) {
            return $next($request);
        }
        else{ //mostrando la pagina de error en caso no tenga rol de Supervisor o Administrador
            abort(403, 'No tienes autorización para ingresar');
        }
    }
}
