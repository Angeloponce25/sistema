<?php

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
use Carbon\Carbon;
Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'MapaController@index')->name('home');
Route::get('/clientes', 'ClienteController@index')->name('clientes');
Route::get('/pagos','PagoController@create')->name('pagos');
Route::post('/pagos.crear', 'PagoController@store')->name('pagos.crear');
Route::get('/pagos.eliminar/{id}', 'PagoController@destroy')->name('pagos.eliminar');
Route::get('/mensualidad','MensualidadController@index')->name('mensualidad.index');
Route::get('adelantar', 'MensualidadController@adelantar' )->name('adelantar');
Route::post('/enviar','MensualidadController@enviar') ->name('enviar.adelantar');
Route::post('/mensualidad.crear', 'MensualidadController@crear')->name('mensualidad.crear');
Route::get('/previa/{id}', 'PagoController@show')->name('pagoprevia');
Route::get('/clientes.crear', 'ClienteController@create')->name('clientes.crear');
Route::post('/clientes.agregar', 'ClienteController@store')->name('clientes.agregar');
Route::get('/clientes.eliminar/{id}', 'ClienteController@destroy')->name('clientes.eliminar');
Route::get('/clientes.activar/{id}', 'ClienteController@activar')->name('clientes.activar');
Route::get('/detalle/{id}', 'ClienteController@show')->name('clientedetalle');
Route::get('/perfil','UserController@index') ->name('perfil');
Route::get('/usuarios','UserController@todos') ->name('usuarios');
Route::get('/password','UserController@password') ->name('password');
Route::post('/updatepassword','UserController@updatepassword') ->name('updatepassword');
Route::get('/pdf/{id}', 'PDFController@PDFgenerator')->name('pdf');
Route::get('/usuarios/editar/{id}', 'UserController@edit' )->name('usuarios.editar');
Route::put('/usuarios/editar/{id}', 'UserController@update' )->name('usuarios.update');
Route::delete('/usuarios/{id}', 'UserController@destroy')->name('usuarios.eliminar');
Route::post('/clientes/all','MensualidadController@all') ->name('clientes.all');
Route::get('/clientes_demo', function () {
    return view('ajax');
});