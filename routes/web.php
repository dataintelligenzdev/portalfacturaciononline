<?php

use App\Http\Livewire\FacturarComponent;
use App\Models\Empresa;
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

Route::view('/', 'inicio');
Route::get('/facturaenlinea-{clave}', function($clave){
    $empresa = Empresa::select('id','status')->where('password',$clave)->first();
    $listado_empresas = Empresa::where('status','1')->orderBy('name','asc')->get();
    $permitir = false;
    $mensaje='';
    if(!isset($empresa->status)){
        $mensaje = 'Lo sentimo, esta empresa no se encuentra registrada en el sistema';
    }else if(!$empresa->status){
        $mensaje = 'Lo sentimo, en estos momentos no podemos facturar para esta empresa';
    }else{
        $permitir =  true;
    }
    
    return view('facturar', ['clave' => $clave,'permitir' => $permitir,'mensaje' => $mensaje, 'listado_empresas'=>$listado_empresas]);
})->name('facturaenlinea');

Route::middleware(['auth:sanctum', 'verified'])->group(function(){
    Route::view('/dashboard','empresas.index')->name('dashboard');
    Route::view('/empresas','empresas.index')->name('empresas');
    Route::view('/metodo_pagos','metodo_pagos.index')->name('metodo_pagos');
});