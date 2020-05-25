<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('surname');
            $table->string('email')->unique();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
            //TIPO DE USUARIOS
            $table->enum('userType', ['Administrador', 'Médico', 'Paciente']);
            //ATRIBUTOS CLASES HIJAS
            $table->String('nuhsa')->nullable();
            $table->unsignedInteger('especialidad_id')->nullable();
            $table->unsignedInteger('medico_id')->nullable();
            $table->unsignedInteger('poliza_id')->nullable();
            $table->unsignedInteger('centroSanitario_id')->nullable();

            $table->foreign('centroSanitario_id')->references('id')->on('centroSanitarios');
            $table->foreign('poliza_id')->references('id')->on('polizas');
            $table->foreign('especialidad_id')->references('id')->on('especialidads');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('users');
    }
}
