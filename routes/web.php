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
Route::get('/', '\App\Http\Controllers\ClientesControlador@index');
Route::get('/novocliente', '\App\Http\Controllers\ClientesControlador@create');
Route::post('/novocliente/salvar', '\App\Http\Controllers\ClientesControlador@store');
Route::get('/cliente/contas/{id}', '\App\Http\Controllers\ClientesControlador@show');
Route::get('/cliente/{id}', '\App\Http\Controllers\ClientesControlador@edit');
Route::put('/cliente/atualizar/{id}', '\App\Http\Controllers\ClientesControlador@update');
Route::get('/cliente/delete/{id}', '\App\Http\Controllers\ClientesControlador@destroy');

Route::get('/contas', '\App\Http\Controllers\ContasControlador@index');
Route::get('/contas/novaconta', '\App\Http\Controllers\ContasControlador@create');
Route::post('/contas/novaconta/salvar', '\App\Http\Controllers\ContasControlador@store');
Route::get('/contas/{id}', '\App\Http\Controllers\ContasControlador@edit');
Route::put('/contas/atualizar/{id}', '\App\Http\Controllers\ContasControlador@update');
Route::get('/contas/delete/{id}', '\App\Http\Controllers\ContasControlador@destroy');
Route::get('/importarcsv', '\App\Http\Controllers\ContasControlador@importcsv');
Route::post('/importarcsvsave', '\App\Http\Controllers\ContasControlador@importcsvsave');