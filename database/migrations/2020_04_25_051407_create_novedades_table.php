<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNovedadesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Novedades', function (Blueprint $table) {
            $table->bigIncrements('ID_novedad');
            $table->string('Tipo',10);
            $table->datetime('Fecha_novedad');
            $table->string('Descripcion',1500); //longitud de 1500 caracteres
            $table->unsignedBigInteger('ID_edificio');
            $table->unsignedBigInteger('ID_usuario_creador');
            $table->timestamp('Fecha_ejecucion')->useCurrent();
            $table->index('ID_edificio', 'IDX_novedades_idedificio'); //idx
            $table->index('Tipo', 'IDX_novedades_tipo'); //idx
            $table->index('Fecha_novedad', 'IDX_novedades_fecha'); //idx
            $table->foreign('ID_edificio')->references('ID_edificio')->on('Edificios'); //fk
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
        Schema::dropIfExists('Novedades');
    }
}
