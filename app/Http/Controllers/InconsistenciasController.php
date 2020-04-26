<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Inconsistencia;
use App\Http\Requests\CreateInconsistenciasRequest;
use App\Http\Requests\MostrarInconsistenciasRequest;
use Illuminate\Support\Facades\DB;

class InconsistenciasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function Edificios_Posiciones(){
        //metodo que contiene el inner join para consultar tablas Edificios y Posiciones para llenar el select de la posicion de la vista crear y buscar inconsistencias de libros concatenando nombre de edificio y posicion
        $edificios_posiciones = DB::table('Posiciones')
        ->join('Edificios', 'Edificios.ID_edificio', '=', 'Posiciones.ID_edificio')
        ->select('Posiciones.ID_posicion', 'Posiciones.Nombre_posicion', 'Posiciones.ID_edificio','Edificios.Nombre_edificio')
        ->get();
        return $edificios_posiciones;
    }


    public function index()
    {
        $edificios_posiciones = $this->Edificios_Posiciones(); //llamando el metodo del inner join
        return view('inconsistencias/buscarinconsistencias', ['posiciones_edificios' => $edificios_posiciones]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()  //GET - mostrar formulario de crear inconsistencias
    {

        $edificios_posiciones = $this->Edificios_Posiciones(); //llamando el metodo del inner join
        return view('inconsistencias/crearinconsistencias',['posiciones_edificios' => $edificios_posiciones]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateInconsistenciasRequest $request) //POST - insertar datos de formulario de crear inconsistencias
    {

        date_default_timezone_set("America/El_Salvador");//definiendo la zona horaria para usar la instancia date() mas abajo
        $data = $request->validated();
        foreach ($request -> Posicion as $row => $r){
            $data2 = array(
                 'Fecha_inconsistencia' => $request -> Fecha[$row],
                 'Descripcion' => $request -> Descripcion[$row],
                 'ID_posicion' => $request -> Posicion[$row],
                 'ID_usuario_creador' => auth() -> user() -> id,
            );
            Inconsistencia::insert($data2);
        }

        return redirect()->route('inconsistencias.create') -> with('status','Las inconsistencias fueron guardadas exitosamente');

        // return($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(MostrarInconsistenciasRequest $request)
    {
        $edificios_posiciones = $this->Edificios_Posiciones(); //llamando el metodo del inner join

        $data = $request->validated();
        $inconsistencias = DB::table('Inconsistencias_de_libros') //utiliza libreria fecades
            ->join('Posiciones', 'Posiciones.ID_posicion', '=', 'Inconsistencias_de_libros.ID_posicion')
            ->join('Edificios', 'Posiciones.ID_edificio', '=', 'Edificios.ID_edificio')
            ->join('users', 'users.id', '=', 'Inconsistencias_de_libros.ID_usuario_creador')
            ->select('Posiciones.Nombre_posicion', 'Edificios.Nombre_edificio', 'Inconsistencias_de_libros.Fecha_inconsistencia', 'Inconsistencias_de_libros.Descripcion', 'users.name')
            ->where('Inconsistencias_de_libros.ID_posicion','LIKE',$request -> Posicion)
            ->whereDate('Inconsistencias_de_libros.Fecha_inconsistencia','>=',$request-> Fecha_desde)
            ->whereDate('Inconsistencias_de_libros.Fecha_inconsistencia','<=',$request-> Fecha_hasta)
            ->orderByRaw('Inconsistencias_de_libros.Fecha_inconsistencia ASC')
            ->get();

        return view('inconsistencias/buscarinconsistencias', [ //llamando la vista buscarnovedad que esta dentro de la carpeta novedades
            'posiciones_edificios' => $edificios_posiciones, //Para volver a llenar el -select- de los edificios luego de hacer la busqueda
            'Inconsistencias' => $inconsistencias, //se manda el resultado de la query
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function estadisticas()
    {
        return view('inconsistencias/estadisticasinconsistencias');
    }

    public function edit($id)
    {
        //
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
