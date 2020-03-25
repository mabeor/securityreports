<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePosicionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Posiciones', function (Blueprint $table) {
            $table->bigIncrements('ID_posicion');
            $table->string('Nombre_posicion',25);
            $table->unsignedBigInteger('ID_edificio');
            $table->timestamps();
            $table->index('ID_posicion', 'IDX_posiciones_idposicion'); //idx
            $table->index('Nombre_posicion', 'IDX_posiciones_nombreposicion'); //idx
            $table->foreign('ID_edificio')->references('ID_edificio')->on('Edificios'); //llave foranea al campo ID_edificio de la tabla Edificios
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Posiciones');
    }
}
