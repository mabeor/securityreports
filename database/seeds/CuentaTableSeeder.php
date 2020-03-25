<?php

use Illuminate\Database\Seeder;
use App\Cuenta;

class CuentaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	//Seeder para llenar la tabla de Cuentas
        $cuenta = new Cuenta();
        $cuenta->Nombre_cuenta = 'Fedex';
        $cuenta->timestamps = false;
        $cuenta->save();

        $cuenta = new Cuenta();
        $cuenta->Nombre_cuenta = 'Hilton';
        $cuenta->timestamps = false;
        $cuenta->save();

        $cuenta = new Cuenta();
        $cuenta->Nombre_cuenta = 'Choice Hotels';
        $cuenta->timestamps = false;
        $cuenta->save();

        $cuenta = new Cuenta();
        $cuenta->Nombre_cuenta = 'Florida Blue';
        $cuenta->timestamps = false;
        $cuenta->save();

        $cuenta = new Cuenta();
        $cuenta->Nombre_cuenta = 'ATS';
        $cuenta->timestamps = false;
        $cuenta->save();

        $cuenta = new Cuenta();
        $cuenta->Nombre_cuenta = 'DirecTV';
        $cuenta->timestamps = false;
        $cuenta->save();

        $cuenta = new Cuenta();
        $cuenta->Nombre_cuenta = 'ART';
        $cuenta->timestamps = false;
        $cuenta->save();

        $cuenta = new Cuenta();
        $cuenta->Nombre_cuenta = 'BMSC Mobility Business';
        $cuenta->timestamps = false;
        $cuenta->save();

        $cuenta = new Cuenta();
        $cuenta->Nombre_cuenta = 'Sprint postpaid';
        $cuenta->timestamps = false;
        $cuenta->save();

        $cuenta = new Cuenta();
        $cuenta->Nombre_cuenta = 'Sprint prepaid';
        $cuenta->timestamps = false;
        $cuenta->save();

        $cuenta = new Cuenta();
        $cuenta->Nombre_cuenta = 'Kohls';
        $cuenta->timestamps = false;
        $cuenta->save();

        $cuenta = new Cuenta();
        $cuenta->Nombre_cuenta = 'Clear Captions';
        $cuenta->timestamps = false;
        $cuenta->save();

        $cuenta = new Cuenta();
        $cuenta->Nombre_cuenta = '7 Eleven';
        $cuenta->timestamps = false;
        $cuenta->save();

        $cuenta = new Cuenta();
        $cuenta->Nombre_cuenta = 'Uverse';
        $cuenta->timestamps = false;
        $cuenta->save();
    }
}
