<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PrendaController;
use App\Http\Controllers\MaterialController;
use App\Http\Controllers\ArchivoController;
use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\ProvedorController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

//Route::get('/index-prenda', [PrendaController::class, 'index']);
//Route::get('/registro-prenda', [PrendaController::class, 'create']);  
//Route::post('/registro-prenda', [PrendaController::class, 'store']); 
//Route::get('/show/{id}?', [PrendaController::class, 'show']);

Route::resource('prenda', PrendaController::class)->middleware('auth'); //regresa a login
Route::resource('material', MaterialController::class)->middleware('auth');
Route::resource('empleado', EmpleadoController::class)->middleware('auth');

Route::resource('provedor', ProvedorController::class)->middleware('auth');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
Route::get('archivo/descarga/{archivo}',  //ruta archivo
    [ArchivoController::class, 'descargar'])
    ->name('archivo.descargar');

Route::resource('archivo',ArchivoController::class)->middleware('auth');