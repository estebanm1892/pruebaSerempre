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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Rutas Ciudades
Route::get('/ciudades', 'CityController@index')->name('ciudades');
Route::get('ciudades/crear', 'CityController@create')->name('ciudades/agregar');
Route::post('ciudades/store', 'CityController@store')->name('ciudades/store');
Route::get('ciudades/actualizar/{id}', 'CityController@edit')->name('ciudades/editar');
Route::post('ciudades/update/{id}', 'CityController@update')->name('ciudades/update');
Route::put('ciudades/eliminar/{id}', 'CityController@destroy')->name('ciudades/eliminar');

// Rutas Clientes
Route::get('/clientes', 'ClientController@index')->name('clientes');
Route::get('clientes/crear', 'ClientController@create')->name('clientes/agregar');
Route::post('clientes/store', 'ClientController@store')->name('clientes/store');
Route::get('clientes/actualizar/{id}', 'ClientController@edit')->name('clientes/editar');
Route::post('clientes/update/{id}', 'ClientController@update')->name('clientes/update');
Route::put('clientes/eliminar/{id}', 'ClientController@destroy')->name('clientes/eliminar');

// Rutas Usuarios
Route::get('/usuarios', 'UserController@index')->name('usuarios');
Route::get('usuarios/crear', 'UserController@create')->name('usuarios/agregar');
Route::post('usuarios/store', 'UserController@store')->name('usuarios/store');
Route::get('usuarios/actualizar/{id}', 'UserController@edit')->name('usuarios/editar');
Route::post('usuarios/update/{id}', 'UserController@update')->name('usuarios/update');
Route::put('usuarios/eliminar/{id}', 'UserController@destroy')->name('usuarios/eliminar');