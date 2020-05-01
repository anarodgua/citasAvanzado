<?php

namespace App\Http\Controllers;

use App\CentroSanitario;
use App\Especialidad;
use App\Poliza;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    public function showAssignCentroSanitario(){
        $centroSanitarios = CentroSanitario::all()->pluck('nombreCentro','id');

        return view ("centroSanitarios.assign", ['centroSanitarios'=>$centroSanitarios]);
    }

    public function showAssignEspecialidad(){
        $especialidades = Especialidad::all()->pluck('nombre', 'id');

        return view ("especialidads.assign", ['especialidades'=>$especialidades]);
    }

    public function asignarEspecialidad(Request $request){
        $especialidad_id = $request->get('especialidad_id');
        $usuarioActual = Auth::user();
        $usuarioActual->especialidad_id = $especialidad_id;
        $usuarioActual->save();
        return view("home");
    }
    public function showAssignPoliza(){
        $polizas = Poliza::all()->pluck('nombre', 'id');

        return view ("polizas.assign", ['polizas'=>$polizas]);
    }

    public function asignarPoliza(Request $request){
        $especialidad_id = $request->get('especialidad_id');
        $usuarioActual = Auth::user();
        $usuarioActual->especialidad_id = $especialidad_id;
        $usuarioActual->save();
        return view("home");
    }


    public function asignarCentroSanitorio(Request $request){
        $centroSanitario_id = $request->get('centroSanitario_id'); //en el formulario el atributo del input que se llama name="centrosanitario_id"
        $usuarioActual = Auth::user();
        $usuarioActual->centroSanitario_id = $centroSanitario_id;
        $usuarioActual->save();
        return view("home");
    }
}
