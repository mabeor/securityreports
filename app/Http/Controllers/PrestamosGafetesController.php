<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CreatePrestamosGafetesRequest;
use App\Http\Requests\MostrarPrestamosGafetes;
use App\Cuenta;
use App\PrestamoGafete;
use Illuminate\Support\Facades\DB;

class PrestamosGafetesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('gafetes-de-excepcion/buscarprestamosdegafete');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $campanas = Cuenta::all();
        return view('gafetes-de-excepcion/crearprestamosgafete',['campanas' => $campanas]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreatePrestamosGafetesRequest $request)
    {
        $data = $request->validated();
        foreach ($request -> Cuenta as $row => $r){
             $data2 = array(
                 'Tipo_gafete' => $request -> TipoGafete[$row],
                 'Numero_gafete' => $request -> NumeroGafete[$row],
                 'Nombre_visita' => $request -> NombreVisita[$row],
                 'Nombre_quien_recibio' => $request -> NombreQuienRecibio[$row],
                 'Fecha_inicio' => $request -> FechaInicio[$row],
                 'Fecha_fin' => $request -> FechaFin[$row],
                 'ID_cuenta' => $request -> Cuenta[$row],
                 'ID_usuario_creador' => auth() -> user() -> id,
            );
            PrestamoGafete::insert($data2);
        }

        return redirect()->route('prestamosgafete.create') -> with('status','Los prestamos de gafetes de excepcion ingresados fueron guardados exitosamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(MostrarPrestamosGafetes $request)
    {

        $data = $request->validated();
        $Prestamos = DB::table('Prestamos_de_gafete_excepcion') //utiliza libreria fecades
                ->join('Cuentas', 'Cuentas.ID_cuenta', '=', 'Prestamos_de_gafete_excepcion.ID_cuenta')
                ->join('users', 'users.id', '=', 'Prestamos_de_gafete_excepcion.ID_usuario_creador')
                ->select('Cuentas.Nombre_cuenta', 'Prestamos_de_gafete_excepcion.Tipo_gafete', 'Prestamos_de_gafete_excepcion.Numero_gafete','Prestamos_de_gafete_excepcion.Nombre_visita', 'Prestamos_de_gafete_excepcion.Nombre_quien_recibio', 'Prestamos_de_gafete_excepcion.Fecha_inicio', 'Prestamos_de_gafete_excepcion.Fecha_fin', 'users.name')
                ->orWhereBetween('Prestamos_de_gafete_excepcion.Fecha_inicio', [$request-> Fecha_desde, $request-> Fecha_hasta])
                ->orWhereBetween('Prestamos_de_gafete_excepcion.Fecha_fin', [$request-> Fecha_desde, $request-> Fecha_hasta])
                ->orwhereRaw("(Prestamos_de_gafete_excepcion.Fecha_inicio < ? AND Prestamos_de_gafete_excepcion.Fecha_fin > ?)", [$request-> Fecha_desde, $request-> Fecha_desde])
                ->orderByRaw('Fecha_inicio ASC')
                ->get();

        return view('gafetes-de-excepcion/buscarprestamosdegafete', [
            'Prestamos' => $Prestamos, //pasando la variable $Prestamos dentro de otra variable llamadda 'Prestamos' que sera leida en la vista buscarprestamosdegafete.blade.php
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function MesAnterior() //era el metodo edit. ******** POR TRABAJAR ***********
    {
        $campanas = Cuenta::all();
        return view('gafetes-de-excepcion/crearprestamosgafete',['campanas' => $campanas]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
