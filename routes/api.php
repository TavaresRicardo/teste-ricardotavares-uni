<?php

use Illuminate\Http\Request;
use App\Cliente;
use App\Telefone;

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

/*
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
*/

Route::get('/testecliente', function (Request $request) {
    return Cliente::all();
});

Route::get('/testetelefone', function (Request $request) {
    return Telefone::all();
});

Route::get('/testetelefonecliente', function (Request $request) {
    return Telefone::find(1)->cliente;
});

Route::post('/clientes', 'ClienteController@store' );
Route::get('/clientes/{id}', 'ClienteController@show');
Route::delete('/clientes/{id}', 'ClienteController@destroy');