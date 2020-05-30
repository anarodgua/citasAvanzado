<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CitasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('citas', function (Blueprint $table) {
            $table->increments('id');
            $table->dateTime('fechaInicio');
            $table->dateTime('fechaFin');
            $table->enum('tipoCita',['consulta','revision']);
            $table->unsignedInteger('localizacion_id');
            $table->unsignedInteger('medico_id');
            $table->unsignedInteger('paciente_id');

            $table->timestamps();

            $table->foreign('localizacion_id')->references('id')->on('localizacions');
            $table->foreign('medico_id')->references('id')->on('users');
            $table->foreign('paciente_id')->references('id')->on('users');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('citas');

    }
}
