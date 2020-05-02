<?php

namespace App\Http\Controllers;

use App\Cita;
use App\Poliza;
use Illuminate\Http\Request;

class PolizaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function showAssignPoliza(){
        $polizas = Poliza::all()->pluck('numero', 'id');

        return view ("polizas.showAssign", ['polizas'=>$polizas]);
    }
    public function showAssignTipoPoliza(){
        $tipoPolizas = Poliza::all()->pluck('tipo', 'id');

        return view ("polizas.showAssign", ['tipoPolizas'=>$tipoPolizas]);
    }

    public function asignarPoliza(Request $request){
        $poliza_id = $request->get('poliza_id');
        $usuarioActual = Auth::user();
        $usuarioActual->poliza_id = $poliza_id;
        $usuarioActual->save();
        return view("home");
    }
    /*public function showAssignCompania(){
        $companias = Compania::all()->pluck('nombre', 'id');

        return view ("polizas.showAssign", ['compania'=>$companias]);
    }
*/
    public function index()
    {
        $companias = Compania::all()->pluck('nombre', 'id');

        return view ("polizas.showAssign", ['compania'=>$companias]);

    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexPaciente(){

    }
    public function indexMedico(){


    }
    public function indexAdministrador(){

    }
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Poliza  $poliza
     * @return \Illuminate\Http\Response
     */
    public function show(Poliza $poliza)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Poliza  $poliza
     * @return \Illuminate\Http\Response
     */
    public function edit(Poliza $poliza)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Poliza  $poliza
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Poliza $poliza)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Poliza  $poliza
     * @return \Illuminate\Http\Response
     */
    public function destroy(Poliza $poliza)
    {
        //
    }
}
