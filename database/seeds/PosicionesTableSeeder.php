<?php

use Illuminate\Database\Seeder;
use App\Posicion;

class PosicionesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $posicion = new Posicion();
        $posicion->Nombre_posicion = 'Entrada principal';
        $posicion->ID_edificio = 1;
        $posicion->save();

        $posicion = new Posicion();
        $posicion->Nombre_posicion = 'Sotano';
        $posicion->ID_edificio = 1;
        $posicion->save();

        $posicion = new Posicion();
        $posicion->Nombre_posicion = 'Pluma';
        $posicion->ID_edificio = 1;
        $posicion->save();

        $posicion = new Posicion();
        $posicion->Nombre_posicion = 'Pluma';
        $posicion->ID_edificio = 2;
        $posicion->save();

        $posicion = new Posicion();
        $posicion->Nombre_posicion = 'Operaciones sur';
        $posicion->ID_edificio = 2;
        $posicion->save();

        $posicion = new Posicion();
        $posicion->Nombre_posicion = 'Operaciones norte';
        $posicion->ID_edificio = 2;
        $posicion->save();

        $posicion = new Posicion();
        $posicion->Nombre_posicion = 'Recepcion';
        $posicion->ID_edificio = 3;
        $posicion->save();

        $posicion = new Posicion();
        $posicion->Nombre_posicion = 'Operaciones nivel 6';
        $posicion->ID_edificio = 4;
        $posicion->save();

        $posicion = new Posicion();
        $posicion->Nombre_posicion = 'Operaciones nivel 7';
        $posicion->ID_edificio = 4;
        $posicion->save();

        $posicion = new Posicion();
        $posicion->Nombre_posicion = 'Recepcion nivel 1';
        $posicion->ID_edificio = 5;
        $posicion->save();

        $posicion = new Posicion();
        $posicion->Nombre_posicion = 'Pluma 1';
        $posicion->ID_edificio = 6;
        $posicion->save();

        $posicion = new Posicion();
        $posicion->Nombre_posicion = 'Recepcion nivel 1';
        $posicion->ID_edificio = 6;
        $posicion->save();

        $posicion = new Posicion();
        $posicion->Nombre_posicion = 'Recepcion nivel 3';
        $posicion->ID_edificio = 6;
        $posicion->save();
    }
}
