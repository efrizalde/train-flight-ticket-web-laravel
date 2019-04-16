<?php

use Illuminate\Http\Request;

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

//ROUTE API PENUMPANG
Route::post('/penumpang/tambah', "PenumpangController@addPenumpang");
Route::post('/penumpang/edit', "PenumpangController@editPenumpang");
Route::post('/penumpang/delete', "PenumpangController@delPenumpang");
Route::post('/penumpang/login', "PenumpangController@login");
Route::post('/penumpang/logout', "PenumpangController@logout");
Route::post('/penumpang/get', "PenumpangController@getuser");

//ROUTE API PEMESANAN
Route::post('/pemesanan/order', "PemesananController@order");
Route::post('/pemesanan/getbyuser', "PemesananController@getorderbyuser");

//ROUTE API RUTE
Route::post('/rute/add', "RuteController@add");
Route::get('/rute/get', "RuteController@get");

//ROUTE API PETUGAS
Route::post('petugas/add', "PetugasController@add");

//ROUTE API TRANSPORTASI
Route::post('/trasnportasi/add', "TransportasiController@add");
