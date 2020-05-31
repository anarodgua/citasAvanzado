<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::delete('especialidads/destroyAll', 'EspecialidadController@destroyAll')->name('especialidads.destroyAll');

Route::resource('citas', 'CitaController');


//rutas solo para médicos
Route::group(['middleware' => 'App\Http\Middleware\MedicoMiddleware'], function() {

    Route::get('/indexMedico', 'CitaController@indexMedico')->name('indexMedico');

    Route::get('/perfilMedico', 'UserController@perfilMedico')->name('perfilMedico');

    Route::get('/showAssignCentroSanitario', 'UserController@showAssignCentroSanitario')->name('showAssignCentroSanitario');
    Route::post('/assignCentroSanitario', 'UserController@asignarCentroSanitorio')->name('assignCentroSanitario');

    Route::get('/showAssignEspecialidad', 'UserController@showAssignEspecialidad')->name('showAssignEspecialidad');
    Route::post('/assignEspecialidad', 'UserController@asignarEspecialidad')->name('assignEspecialidad');

});

//rutas solo para pacientes
Route::group(['middleware' => 'App\Http\Middleware\PacienteMiddleware'], function() {

    Route::get('/showAssignPoliza', 'PolizaController@showAssignPoliza')->name('showAssignPoliza');
    Route::post('/assignPoliza', 'PolizaController@asignarPoliza')->name('assignPoliza');

    Route::get('/perfilPaciente', 'UserController@perfilPaciente')->name('perfilPaciente');

    Route::get('/indexPaciente', 'CitaController@indexPaciente')->name('indexPaciente');
    Route::get('/editPaciente/{id}', 'CitaController@editPaciente')->name('editPaciente');
    Route::get('/createPaciente', 'CitaController@createPaciente')->name('createPaciente');
    Route::post('/storePaciente', 'CitaController@storePaciente')->name('storePaciente');
    Route::put('/updatePaciente/{id}', 'CitaController@updatePaciente')->name('updatePaciente');
    Route::delete('/destroyPaciente/{id}', 'CitaController@destroyPaciente')->name('destroyPaciente');
    Route::get('/cuadroMedico', 'UserController@cuadroMedico')->name('cuadroMedico');









});
//rutas solo para administradores
Route::group(['middleware' => 'App\Http\Middleware\AdminMiddleware'], function() {
    Route::resource('users', 'UserController');
    Route::resource('centroSanitarios', 'CentroSanitariosController');
    Route::resource('localizacions', 'LocalizacionController');
    Route::resource('companias', 'companiaController');
    Route::resource('polizas', 'PolizaController');
    Route::resource('especialidads', 'EspecialidadController');
    Route::put('/editCita', 'CitaController@updateAdmin')->name('editCita');
    //Route::put('/edit', 'UserController@update')->name('edit');
    Route::delete('/destroyUser/{id}', 'UserController@destroyUser')->name('destroyUser');



});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
