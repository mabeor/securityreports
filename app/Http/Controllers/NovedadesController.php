<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Novedad;
use App\Edificio;
use App\Http\Requests\CreateNovedadRequest;
use App\Http\Requests\MostrarNovedadesRequest;
use Illuminate\Support\Facades\DB;

class NovedadesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $edificios = Edificio::all();
        return view('novedades/buscarnovedad', ['edificios' => $edificios]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $edificios = Edificio::all();
        return view('novedades/crearnovedades', ['edificios' => $edificios]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateNovedadRequest $request)
    {
        $data = $request->validated();

        foreach ($request -> Edificio as $row => $r){
             $data2 = array(
                 'Tipo' => $request -> Tipo[$row],
                 'Fecha_novedad' => $request -> Fecha[$row],
                 'Descripcion' => $request -> Descripcion[$row],
                 'ID_edificio' => $request -> Edificio[$row],
                 'ID_usuario_creador' => auth() -> user() -> id,
            );
            Novedad::insert($data2);
        }

        return redirect()->route('novedades.create') -> with('status','Las novedades fueron guardadas exitosamente');
        // return $request;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(MostrarNovedadesRequest $request)
    {
        $edificios = Edificio::all();
        $data = $request->validated();
        $novedades = DB::table('Novedades') //utiliza libreria fecades
                ->join('Edificios', 'Edificios.ID_edificio', '=', 'Novedades.ID_edificio')
                ->join('users', 'users.id', '=', 'Novedades.ID_usuario_creador')
                ->select('Edificios.Nombre_edificio', 'Novedades.Tipo', 'Novedades.Fecha_novedad','Novedades.Descripcion', 'users.name')
                ->where('Novedades.ID_edificio','LIKE',$request -> Edificio)
                ->where('Novedades.Tipo','LIKE',$request -> Tipo)
                ->whereDate('Novedades.Fecha_novedad','>=',$request-> Fecha_desde)
                ->whereDate('Novedades.Fecha_novedad','<=',$request-> Fecha_hasta)
                ->orderByRaw('Novedades.Fecha_novedad ASC')
                ->get();


        return view('novedades/buscarnovedad', [ //llamando la vista buscarnovedad que esta dentro de la carpeta novedades
            'edificios' => $edificios, //Para volver a llenar el -select- de los edificios luego de hacer la busqueda
            'Novedades' => $novedades, //se manda el resultado de la query
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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
