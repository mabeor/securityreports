<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePrestamosgafeteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Prestamos_de_gafete_excepcion', function (Blueprint $table) {
            $table->bigIncrements('ID_prestamo');
            $table->string('Tipo_gafete',30);
            $table->integer('Numero_gafete');
            $table->string('Nombre_visita',50);
            $table->string('Nombre_quien_recibio',50);
            $table->date('Fecha_inicio');
            $table->date('Fecha_fin');
            $table->unsignedBigInteger('ID_cuenta');
            $table->unsignedBigInteger('ID_usuario_creador');
            $table->timestamp('Fecha_ejecucion')->useCurrent();
            $table->index('Fecha_inicio', 'IDX_prestamos_fechainicio'); //idx
            $table->index('Fecha_fin', 'IDX_prestamos_fechafin'); //idx
            $table->foreign('ID_cuenta')->references('ID_cuenta')->on('Cuentas'); //fk
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
        Schema::dropIfExists('Prestamos_de_gafete_excepcion');
    }
}
