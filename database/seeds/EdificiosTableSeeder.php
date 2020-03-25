<?php

use Illuminate\Database\Seeder;
use App\Edificio;

class EdificiosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $edificio = new Edificio();
        $edificio->Nombre_edificio = 'TP1';
        $edificio->save();

        $edificio = new Edificio();
        $edificio->Nombre_edificio = 'TP2';
        $edificio->save();

        $edificio = new Edificio();
        $edificio->Nombre_edificio = 'TP3';
        $edificio->save();

        $edificio = new Edificio();
        $edificio->Nombre_edificio = 'TP4';
        $edificio->save();

        $edificio = new Edificio();
        $edificio->Nombre_edificio = 'TP5';
        $edificio->save();

        $edificio = new Edificio();
        $edificio->Nombre_edificio = 'TP6';
        $edificio->save();
    }
}
