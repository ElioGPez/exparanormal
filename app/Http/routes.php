<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'HomeController@index');

Route::get('home', 'HomeController@index');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
Route::resource('storage', 'StorageController');
Route::resource('categoria','CategoriaController');
Route::resource('comentario','ComentarioController');
Route::resource('imagen','ImagenController');
Route::resource('pais','PaisController');
Route::resource('provincia','ProvinciaController');
Route::resource('localidad','LocalidadController');
Route::resource('user','UserController');
Route::resource('video','VideoController');
Route::resource('publicacion','PublicacionController');
Route::resource('puntuacion','PuntuacionController');

Route::get('pais/consulta/{consulta}',[
  'uses'  =>  'PaisController@consulta',
  'as'    =>  'pais.consulta',
]);
Route::get('provincia/consulta/{consulta}',[
  'uses'  =>  'ProvinciaController@consulta',
  'as'    =>  'provincia.consulta',
]);
Route::get('provincia/consulta/{consulta}',[
  'uses'  =>  'ProvinciaController@consulta',
  'as'    =>  'provincia.consulta',
]);
//Route::post('store_comentario', 'ComentarioController@store');
Route::post('comentario/ajax',[
  'uses'  =>  'ComentarioController@ajax',
  'as'    =>  'comentario.ajax',
]);