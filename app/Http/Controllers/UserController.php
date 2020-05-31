<?php

namespace App\Http\Controllers;

use App\CentroSanitario;
use App\Compania;
use App\Especialidad;
use App\Poliza;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function perfilPaciente (){
        $user =Auth::user();
        return view('users.perfilPaciente',['user'=>$user]);
    }
    public function perfilMedico(){
        $user=Auth::user();
        return view('users.perfilMedico', ['user'=>$user]);
    }


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

    public function asignarCentroSanitorio(Request $request){
        $centroSanitario_id = $request->get('centroSanitario_id'); //en el formulario el atributo del input que se llama name="centrosanitario_id"
        $usuarioActual = Auth::user();
        $usuarioActual->centroSanitario_id = $centroSanitario_id;
        $usuarioActual->save();
        return view("home");
    }
    public function cuadroMedico(){
        $medicos=User::where('userType', 'Medico')->get();


       return view('users.cuadroMedico',['medicos'=>$medicos]);

    }


    public function index(Request $request)
    {

            $users = User::all();



        return view('users.index',['users'=>$users]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        //$especialidades = Especialidad::all()->pluck('nombre','id');

        return view('users.create');

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
            'name' => 'required|max:255',
            'surname' => 'required|max:255',
           // 'especialidad_id' => 'required|exists:especialidads,id',
            'email'=> 'required|max:255',
            'password'=> 'required|max:255',
            'userType'=> 'required',

        ]);
        $user = new User($request->all());
        $user->save();

        // return redirect('especialidades');

        flash('Usuario creado correctamente');

        return redirect()->route('users.index');
    }
    protected function altaUsers(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'surname' => $data['surname'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'nuhsa' => $data['nuhsa'],
            'userType' => $data['userType'],


        ]);
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
        //

        $user = User::find($id);



        return view('users.edit',['user'=> $user]);
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
            'name' => 'required|max:255',
            'surname' => 'required|max:255',
            //'especialidad_id' => 'required|exists:especialidads,id'
        ]);

        $user = User::find($id);
        $user->fill($request->all());

        $user->save();

        flash('Usuario modificado correctamente');

        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        flash('Medico borrado correctamente');

        return redirect()->route('users.index');
    }
    public function destroyUser($id)
    {
        $user = User::find($id);
        $user->delete();
        flash('Usuario borrado correctamente');

        return redirect()->route('users.index');
    }
}
