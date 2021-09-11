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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/algo',['as'=>'ruta','uses'=>'EjemploController@index']);
Route::get('/tabla',['as'=>'miTabla','uses'=>'EjemploController@tabla']);

//Route::get('/algo',['as'=>'ruta','uses'=>'App\Http\Controllers\EjemploController@index']);
//Route::get('/tabla',['as'=>'mitabla','uses'=>'App\Http\Controllers\EjemploController@tabla']);