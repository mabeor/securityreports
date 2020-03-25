<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cuenta;
use App\Apertura;
 use App\Http\Requests\CreateAperturaCierreRequest;
use App\Http\Requests\MostrarAperturasCierresRequest;
use Illuminate\Support\Facades\DB;

class AperturasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()//metodo para mostrar el formulario de buscar aperturas de cuenta y llenar el -select- con las cuentas - GET
    {
        $campanas = Cuenta::all();
         return view('aperturas-cierres/buscarapertura',['campanas' => $campanas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()//metodo para mostrar el formulario de crear aperturas de cuenta y llenar el -select- con las cuentas - GET
    {
        $campanas = Cuenta::all();
        return view('aperturas-cierres/crearaperturas',['campanas' => $campanas]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateAperturaCierreRequest $request)//metodo para insertar las aperturas de cuenta - POST
    {
        date_default_timezone_set("America/El_Salvador");//definiendo la zona horaria para usar la instancia date() mas abajo
        $data = $request->validated();
        foreach ($request -> Edificio as $row => $r){
             $data2 = array(
                 'Edificio' => $request -> Edificio[$row],
                 'Cuenta' => $request -> Cuenta[$row],
                 'Fecha_apertura' => date("Y.m.d") . ' ' . $request -> Hora[$row],
                 'Creado_por' => auth() -> user() -> name,
            );
            Apertura::insert($data2);
        }
        return redirect()->route('aperturas.create') -> with('status','Las aperturas de cuentas fueron guardadas exitosamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(MostrarAperturasCierresRequest $request)//metodo para devolver los resultados de la consulta de aperturas de cuenta - POST
    {
        $campanas = Cuenta::all();
        $data = $request->validated();
        $Aperturas = DB::table('Aperturas_de_cuenta') //utiliza fecades
                            ->where('Edificio','LIKE',$request -> Edificio)
                            ->where('Cuenta','LIKE',$request -> Cuenta)
                            ->whereDate('Fecha_apertura','>=',$request-> Fecha_desde)
                            ->whereDate('Fecha_apertura','<=',$request-> Fecha_hasta)
                            ->orderByRaw('Fecha_apertura ASC')
                            ->get();

        return view('aperturas-cierres/buscarapertura', [ //llamando la vista aperturas-cierres que esta dentro de la carpeta aperturas-cierres
            'campanas' => $campanas, //Para volver a llenar el -select- de las cuentas luego de hacer la busqueda
            'Aperturas' => $Aperturas,
        ]);
    }

    //se quitaron los metodos destroy, edit y update pues no se utilizan
}
