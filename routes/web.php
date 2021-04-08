<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
*/

/* -----
EJEMPLOS DE RUTAS 

Route::resource();

// Todas las siguientes exsiten dentro de las rutas de tipo Resource
Route::get();
Route::post();
Route::put();
Route::delete();
--- */

Route::get('/', [
	'uses' => 'App\Http\Controllers\HomeController@mainSite',
	'as' => 'index'
]);

Auth::routes();

Route::group(['middleware' => 'auth'], function(){
	Route::resource('/proyectos', 'App\Http\Controllers\ProjectController');
	Route::resource('/tareas', 'App\Http\Controllers\TaskController');

	Route::post('/completar-tarea/{id}',[
		'uses' => 'App\Http\Controllers\TaskController@changeStatus',
		'as' => 'completar.tarea'
	]);

	Route::get('/admin', [
		'uses' => 'App\Http\Controllers\HomeController@index',
		'as' => 'home'
	]);
});

// Ruta fuera de Middleware //
/*
Route::get('/proyectos/{id}', [
	'uses' => 'App\Http\Controllers\ProjectController@show',
	'as' => 'proyectos.show'
]);
*/
