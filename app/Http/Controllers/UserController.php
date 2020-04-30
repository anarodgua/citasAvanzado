<?php

namespace App\Http\Controllers;

use App\CentroSanitario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    public function showAssignCentroSanitario(){
        $centroSanitarios = CentroSanitario::all()->pluck('nombreCentro','id');

       // dd($centroSanitarios);



        return view ("centroSanitarios.assign", ['centroSanitarios'=>$centroSanitarios]);
    }

    public function asignarCentroSanitorio(Request $request){
        $centroSanitario_id = $request->get('centroSanitario_id'); //en el formulario el atributo del input que se llama name="centrosanitario_id"
        $usuarioActual = Auth::user();
        $usuarioActual->centroSanitario_id = $centroSanitario_id;
        $usuarioActual->save();
        return view("home");
    }
}
