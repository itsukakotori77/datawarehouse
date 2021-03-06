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

Route::get('/', 'PagesController@home');

Route::get('/test', function(){
    return view('layouts.app');
});

// UMKM
Route::resource('umkm', 'UMKMController');
Route::get('/umkm/convert', 'UMKMController@convert');

// Data Warehouse
Route::resource('datawarehouse', 'DataWarehouseController');
Route::delete('/datawarehouse', 'DataWarehouseController@destroy');

// Visualisasi
Route::get('/visualisasi', 'VisualisasiController@index');

