<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('/algo',['as'=>'ruta','uses'=>'App\Http\Controllers\EjemploController@index']);
Route::get('/tabla',['as'=>'miTabla','uses'=>'App\Http\Controllers\EjemploController@tabla']);
Route::get('/productos',['as'=>'obtenerProductos','uses'=>'App\Http\Controllers\EjemploController@getProducts']);