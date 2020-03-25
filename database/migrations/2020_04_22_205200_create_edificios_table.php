<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEdificiosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Edificios', function (Blueprint $table) {
            $table->bigIncrements('ID_edificio');
            $table->string('Nombre_edificio',25);
            $table->timestamps();
            $table->index('ID_edificio', 'IDX_edificios_idedificio'); //idx
            $table->index('Nombre_edificio', 'IDX_edificios_nomnbreedificio'); //idx
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Edificios');
    }
}
