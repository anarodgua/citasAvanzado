<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CentroSanitariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('centroSanitarios', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombreCentro');
            $table->enum('provincia', ['A Coruña', 'Álava', 'Albacete',
                'Alicante', 'Almería','Asturias','Ávila','Badajoz','Baleares','Barcelona','Burgos','Cáceres','Cádiz',
                'Cantabria','Castellón','Ciudad Real','Córdoba','Cuenca','Girona','Granada','Guadalajara','Gipuzkoa','Huelva','Huesca',
                'Jaén','La Rioja','Las Palmas','León','Lérida','Lugo Madrid','Málaga','Murcia','Navarra','Ourense','Palencia','Pontevedra',
                'Salamanca','Segovia','Sevilla','Soria','Tarragona','Santa Cruz de Tenerife','Teruel','Toledo','Valencia','Valladolid','Vizcaya',
                'Zamora','Zaragoza','Ceuta','Melilla']);
            $table->timestamps();
            $table->unsignedInteger('centroPadre')->nullable();
            $table->foreign('centroPadre')->references('id')->on('centroSanitarios');



        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('centroSanitarios');
    }
}
