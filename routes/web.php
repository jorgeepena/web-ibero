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

Route::resource('/proyectos', 'App\Http\Controllers\ProjectController');

Route::resource('/tareas', 'App\Http\Controllers\TaskController');
Route::post('/completar-tarea/{id}',[
	'uses' => 'App\Http\Controllers\TaskController@changeStatus',
	'as' => 'completar.tarea'
]);

