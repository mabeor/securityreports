<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInconsistenciasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Inconsistencias_de_libros', function (Blueprint $table) {
            $table->bigIncrements('ID_inconsistencia');
            $table->date('Fecha_inconsistencia');
            $table->string('Descripcion',1500);
            $table->timestamp('Fecha_ejecucion')->useCurrent();
            $table->unsignedBigInteger('ID_posicion');
            $table->unsignedBigInteger('ID_usuario_creador');
            $table->index('ID_posicion', 'IDX_inconsistencias_idposicion'); //idx
            $table->index('Fecha_inconsistencia', 'IDX_inconsistencias_fecha'); //idx
            $table->foreign('ID_posicion')->references('ID_posicion')->on('Posiciones'); //fk
            $table->foreign('ID_usuario_creador')->references('id')->on('users'); //fk
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Inconsistencias_de_libros');
    }
}
