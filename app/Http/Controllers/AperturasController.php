<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cuenta;
use App\Apertura;
use App\Edificio;
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
        $edificios = Edificio::all();
        $campanas = Cuenta::all();
        return view('aperturas-cierres/buscarapertura',['campanas' => $campanas, 'edificios' => $edificios]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()//metodo para mostrar el formulario de crear aperturas de cuenta y llenar el -select- con las cuentas - GET
    {
        $edificios = Edificio::all();
        $campanas = Cuenta::all();
        return view('aperturas-cierres/crearaperturas',['campanas' => $campanas, 'edificios' => $edificios]);
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
                 'Fecha_apertura' => $request -> Hora[$row],
                 'ID_cuenta' => $request -> Cuenta[$row],
                 'ID_edificio' => $request -> Edificio[$row],
                 'ID_usuario_creador' => auth() -> user() -> id,
            );
            Apertura::insert($data2);
        }

        return redirect()->route('aperturas.create') -> with('status','Las aperturas de cuenta fueron guardadas exitosamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(MostrarAperturasCierresRequest $request)//metodo para devolver los resultados de la consulta de aperturas de cuenta - POST
    {
        $edificios = Edificio::all();
        $campanas = Cuenta::all();
        $data = $request->validated();
        $Aperturas = DB::table('Aperturas_de_cuenta') //utiliza fecades
                ->join('Edificios', 'Edificios.ID_edificio', '=', 'Aperturas_de_cuenta.ID_edificio')
                ->join('Cuentas', 'Cuentas.ID_cuenta', '=', 'Aperturas_de_cuenta.ID_cuenta')
                ->join('users', 'users.id', '=', 'Aperturas_de_cuenta.ID_usuario_creador')
                ->select('Edificios.Nombre_edificio', 'Cuentas.Nombre_cuenta', 'Aperturas_de_cuenta.Fecha_apertura','users.name')
                ->where('Aperturas_de_cuenta.ID_edificio','LIKE',$request -> Edificio)
                ->where('Aperturas_de_cuenta.ID_cuenta','LIKE',$request -> Cuenta)
                ->whereDate('Aperturas_de_cuenta.Fecha_apertura','>=',$request-> Fecha_desde)
                ->whereDate('Aperturas_de_cuenta.Fecha_apertura','<=',$request-> Fecha_hasta)
                ->orderByRaw('Edificios.Nombre_edificio ASC, Aperturas_de_cuenta.Fecha_apertura ASC')
                ->get();

        return view('aperturas-cierres/buscarapertura', [ //llamando la vista buscarapertura que esta dentro de la carpeta aperturas-cierres
            'campanas' => $campanas, //Para volver a llenar el -select- de las cuentas luego de hacer la busqueda
            'edificios' => $edificios, //Para volver a llenar el -select- de los edificios luego de hacer la busqueda
            'Aperturas' => $Aperturas, //se manda el resultado de la query
        ]);
    }

    //se quitaron los metodos destroy, edit y update pues no se utilizan
}
