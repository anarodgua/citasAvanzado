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

Route::resource('users', 'UserController');
Route::resource('citas', 'CitaController');
Route::resource('centroSanitarios', 'CentroSanitariosController');
Route::resource('localizacions', 'LocalizacionController');
Route::resource('companias', 'companiaController');
Route::resource('polizas', 'PolizaController');
Route::resource('especialidads', 'EspecialidadController');

//rutas solo para médicos
Route::group(['middleware' => 'App\Http\Middleware\MedicoMiddleware'], function() {

    Route::get('/showAssignCentroSanitario', 'UserController@showAssignCentroSanitario')->name('showAssignCentroSanitario');
    Route::post('/assignCentroSanitario', 'UserController@asignarCentroSanitorio')->name('assignCentroSanitario');

    Route::get('/showAssignEspecialidad', 'UserController@showAssignEspecialidad')->name('showAssignEspecialidad');
    Route::post('/assignEspecialidad', 'UserController@asignarEspecialidad')->name('assignEspecialidad');

});

//rutas solo para pacientes
Route::group(['middleware' => 'App\Http\Middleware\PacienteMiddleware'], function() {

    Route::get('/showAssignPoliza', 'PolizaController@showAssignPoliza')->name('showAssignPoliza');
    Route::post('/assignPoliza', 'PolizaController@asignarPoliza')->name('assignPoliza');

});
//rutas solo para administradores
Route::group(['middleware' => 'App\Http\Middleware\AdminMiddleware'], function() {

});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
