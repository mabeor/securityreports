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
            $table->bigIncrements('ID');
            $table->string('Edificio');
            $table->string('Cuenta');
            $table->datetime('Fecha_apertura');
            $table->string('Creado_por')->nullable();//quitar nullable cuando ya existan los usuarios
            $table->timestamp('Fecha_ejecucion')->useCurrent();
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
