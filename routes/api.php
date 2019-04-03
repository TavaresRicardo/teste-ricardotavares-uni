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

Route::get('/clientes', 'ClienteController@index' );
Route::get('/clientes/telefone/{id}', 'ClienteController@telefones' );
Route::post('/clientes', 'ClienteController@store' );
Route::get('/clientes/create', 'ClienteController@create' );
Route::get('/clientes/{id}', 'ClienteController@show');
Route::put('/clientes/{id}', 'ClienteController@update');
Route::delete('/clientes/{id}', 'ClienteController@destroy');
Route::get('/clientes/{id}/edit', 'ClienteController@edit');


Route::get('/telefones', 'TelefoneController@index' );
Route::post('/telefones', 'TelefoneController@store' );
Route::get('/telefones/create', 'TelefoneController@create' );
Route::get('/telefones/{id}', 'TelefoneController@show');
Route::put('/telefones/{id}', 'TelefoneController@update');
Route::delete('/telefones/{id}', 'TelefoneController@destroy');
Route::get('/telefones/{id}/edit', 'TelefoneController@edit');
