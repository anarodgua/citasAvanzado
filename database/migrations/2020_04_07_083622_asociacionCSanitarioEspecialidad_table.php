<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AsociacionCSanitarioEspecialidadTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asociacionCSanitarioEspecialidad', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('especialidad_id');
            $table->unsignedInteger('centroSanitario_id');
            $table->timestamps();

            $table->foreign('especialidad_id')->references('id')->on('especialidads');
            $table->foreign('centroSanitario_id')->references('id')->on('centroSanitarios');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('asociacionCSanitarioEspecialidad');
    }
}
