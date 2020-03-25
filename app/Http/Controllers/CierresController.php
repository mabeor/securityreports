<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cuenta;
use App\Cierre;
 use App\Http\Requests\CreateAperturaCierreRequest;
use App\Http\Requests\MostrarAperturasCierresRequest;
use Illuminate\Support\Facades\DB;

class CierresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() //metodo para mostrar el formulario de buscar cierres de cuenta y llenar el -select- con las cuentas - GET
    {
        $campanas = Cuenta::all();
         return view('aperturas-cierres/buscarcierre',['campanas' => $campanas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()//metodo para mostrar el formulario de crear cierres de cuenta y llenar el -select- con las cuentas - GET
    {
        $campanas = Cuenta::all();
        return view('aperturas-cierres/crearcierres', ['campanas' => $campanas]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateAperturaCierreRequest $request)//metodo para insertar los cierres de cuenta - POST
    {
        date_default_timezone_set("America/El_Salvador");//definiendo la zona horaria para usar la instancia date() mas abajo
        $data = $request->validated();
        foreach ($request -> Edificio as $row => $r){
             $data2 = array(
                 'Edificio' => $request -> Edificio[$row],
                 'Cuenta' => $request -> Cuenta[$row],
                 'Fecha_cierre' => date("Y.m.d",strtotime("-1 day")) . ' ' . $request -> Hora[$row],
                 'Creado_por' => auth() -> user() -> name,
            );
            Cierre::insert($data2);
        }
        return redirect()->route('cierres.create') -> with('status','Los cierres de cuentas fueron guardados exitosamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(MostrarAperturasCierresRequest $request)//metodo para devolver los resultados de la consulta de cierres de cuenta - POST
    {
        $campanas = Cuenta::all();
        $data = $request->validated();
        $Cierres = DB::table('Cierres_de_cuenta') //utiliza fecades
                            ->where('Edificio','LIKE',$request -> Edificio)
                            ->where('Cuenta','LIKE',$request -> Cuenta)
                            ->whereDate('Fecha_cierre','>=',$request-> Fecha_desde)
                            ->whereDate('Fecha_cierre','<=',$request-> Fecha_hasta)
                            ->orderByRaw('Fecha_cierre ASC')
                            ->get();

        return view('aperturas-cierres/buscarcierre', [ //llamando la vista aperturas-cierres que esta dentro de la carpeta aperturas-cierres
            'campanas' => $campanas,
            'Cierres' => $Cierres,
        ]);
    }

    //se quitaron los metodos destroy, edit y update pues no se utilizan
}
