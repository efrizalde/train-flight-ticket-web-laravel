<?php

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
    return redirect('dashboard');
});

Route::post('dologin', 'Auth\LoginController@dologin');

Auth::routes();
Route::group(['middleware' => 'auth'], function () {
    Route::get('logout', 'Auth\LoginController@logout');
    Route::get('dashboard', 'HomeController@index')->name('dashboard');

    Route::get('rute', 'RuteController@index')->name('rute');
    Route::post('rute/addrute', 'RuteController@addrute');
    Route::post('rute/editrute', 'RuteController@editrute');
    Route::get('rute/delrute/{id}', 'RuteController@delrute');

    Route::get('pesanan', 'PemesananController@index')->name('pesanan');
    Route::get('pesanan/validasi/{id}', 'PemesananController@validasi');
    Route::get('pesanan/downloadPDF/{id}', 'PemesananController@downloadPDF');
    
    Route::get('transportasi', 'TransportasiController@index')->name('transportasi');
    Route::post('transportasi/addtp', 'TransportasiController@addtp');
    Route::post('transportasi/edittp', 'TransportasiController@edittp');
    Route::get('transportasi/deltp/{id}', 'TransportasiController@deltp');

    Route::get('petugas', 'PetugasController@index')->name('petugas');
    Route::post('petugas/register', 'PetugasController@register');
});
