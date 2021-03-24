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

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->group(function(){
    Route::view('/dashboard','empresas.index')->name('dashboard');
    Route::view('/empresas','empresas.index')->name('empresas');
    Route::view('/metodo_pagos','metodo_pagos.index')->name('metodo_pagos');
});