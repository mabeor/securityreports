<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAperturasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Aperturas_de_cuenta', function (Blueprint $table) {
            $table->bigIncrements('ID_apertura');
            $table->datetime('Fecha_apertura');
            $table->unsignedBigInteger('ID_cuenta');
            $table->unsignedBigInteger('ID_edificio');
            $table->unsignedBigInteger('ID_usuario_creador');
            $table->timestamp('Fecha_ejecucion')->useCurrent();
            $table->index('ID_cuenta', 'IDX_aperturas_cuenta'); //idx
            $table->index('ID_edificio', 'IDX_aperturas_idedificio'); //idx
            $table->index('Fecha_apertura', 'IDX_aperturas_fecha'); //idx
            $table->foreign('ID_cuenta')->references('ID_cuenta')->on('Cuentas'); //fk
            $table->foreign('ID_edificio')->references('ID_edificio')->on('Edificios'); //fk
            $table->foreign('ID_usuario_creador')->references('id')->on('users'); //fk a tabla usuarios
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Aperturas_de_cuenta');
    }
}
