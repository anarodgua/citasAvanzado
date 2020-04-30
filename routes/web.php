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

Route::delete('especialidades/destroyAll', 'EspecialidadController@destroyAll')->name('especialidades.destroyAll');

Route::resource('users', 'UserController');
Route::resource('citas', 'CitaController');
Route::resource('centroSanitarios', 'CentroSanitariosController');
Route::resource('localizacions', 'LocalizacionController');
Route::resource('companias', 'companiaController');
Route::resource('polizas', 'PolizaController');
Route::resource('especialidads', 'EspecialidadController');

Route::get('/showAssignCentroSanitario', 'UserController@showAssignCentroSanitario')->name('showAssignCentroSanitario');
Route::post('/assignCentroSanitario', 'UserController@asignarCentroSanitorio')->name('assignCentroSanitario');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
