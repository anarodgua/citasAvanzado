<?php

namespace App\Http\Controllers;

use App\CentroSanitario;
use App\Localizacion;
use Illuminate\Http\Request;
use App\Cita;
use App\User;
use Illuminate\Support\Facades\Auth;


class CitaController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $citas = Cita::all();

        return view('citas/index',['citas'=>$citas]);
    }
    public function indexPaciente()
    {
        $citas = Cita::where('paciente_id', Auth::user()->id)->get();
        return view('citas.indexPaciente',['citas'=>$citas]);
    }
    public function indexMedico()
    {
        $citas = Cita::where('medico_id', Auth::user()->id)->get();
        return view('citas.indexMedico',['citas'=>$citas]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $medicos = User::where('userType', 'Medico')->get()->pluck('name','id');
        $pacientes = User::where('userType', 'Paciente')->get()->pluck('name','id');
        //  $centroSanitarios = CentroSanitario::all()->pluck('nombreCentro','id');
        $localizaciones=Localizacion::all()->pluck('consulta','id');
      //  $localizaciones->each()
       // $localizaciones->pluck('fullName', 'id');
        //dd($localizaciones);

        return view('citas/create',['medicos'=>$medicos,'localizaciones'=> $localizaciones, 'pacientes'=> $pacientes]);
    }
    public function createPaciente()
    {
        $medicos = User::where('userType', 'Medico')->get()->pluck('name','id');
        //  $centroSanitarios = CentroSanitario::all()->pluck('nombreCentro','id');
        $localizaciones=Localizacion::all()->pluck('consulta','id');
        //  $localizaciones->each()
        // $localizaciones->pluck('fullName', 'id');
        //dd($localizaciones);
        return view('citas.createPaciente',['medicos'=>$medicos,'localizaciones'=> $localizaciones]);
    }

/**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'medico_id' => 'required|exists:users,id',
            'paciente_id' => 'required|exists:users,id',
            'localizacion_id' => 'required|exists:localizacions,id',
            'fechaInicio' => 'required|date|after:now',
            //'fechaFin' => 'required|date|after:now',


        ]);

        $cita = new Cita($request->all());
        $fecha_inicio_copy = clone $cita->fechaInicio;
        $cita->fechaFin = $fecha_inicio_copy->addMinutes(15);

            $cita->save();


            flash('Cita creada correctamente');

            return redirect()->route('citas.index');
        }

    public function storePaciente(Request $request)
    {
        $this->validate($request, [
            'medico_id' => 'required|exists:users,id',
            'localizacion_id' => 'required|exists:localizacions,id',
            'fechaInicio' => 'required|date|after:now',
            //'fechaFin' => 'required|date|after:now',


        ]);
        //las citas tienen una duración predeterminada de 15 min
        $cita = new Cita($request->all());
        $fecha_inicio_copy = clone $cita->fechaInicio;
        $cita->fechaFin = $fecha_inicio_copy->addMinutes(15);
        $cita->paciente_id = Auth::user()->id;

            $cita->save();


            flash('Cita creada correctamente');

            return redirect()->route('indexPaciente');
        }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {


        $cita = Cita::find($id);

        $medicos = User::where('userType', 'Medico')->get()->pluck('name','id');

        $localizaciones=Localizacion::all()->pluck('consulta','id');


        return view('citas/edit',['cita'=> $cita, 'medicos'=>$medicos, 'localizaciones'=>$localizaciones]);
    }
    public function editPaciente($id)
    {

        $cita = Cita::find($id);

        $medicos = User::where('userType', 'Medico')->get()->pluck('name','id');

        $localizaciones=Localizacion::all()->pluck('consulta','id');


        return view('citas.editPaciente',['cita'=> $cita, 'medicos'=>$medicos, 'localizaciones'=>$localizaciones]);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'medico_id' => 'required|exists:users,id',
            'localizacion_id' => 'required|exists:localizacions,id',
            'fechaInicio' => 'required|date|after:now',

        ]);
        $cita = Cita::find($id);
        $cita->fill($request->all());

        $cita->save();

        flash('Cita modificada correctamente');

        return redirect()->route('citas.index');
    }
    public function updatePaciente(Request $request, $id)
    {
        $this->validate($request, [
            'medico_id' => 'required|exists:users,id',
            'localizacion_id' => 'required|exists:localizacions,id',
            'fechaInicio' => 'required|date|after:now',

        ]);
        $cita = Cita::find($id);
        $cita->fill($request->all());

        $cita->save();

        flash('Cita modificada correctamente');

        return redirect()->route('indexPaciente');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cita = Cita::find($id);
        $cita->delete();
        flash('Cita borrada correctamente');

        return redirect()->route('citas.index');
    }
    public function destroyPaciente($id)
    {
        $cita = Cita::find($id);
        $cita->delete();
        flash('Cita borrada correctamente');

        return redirect()->route('indexPaciente');
    }
}
