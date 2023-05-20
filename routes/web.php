<?php

use App\Http\Controllers\GoogleAuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PrendaController;
use App\Http\Controllers\MaterialController;
use App\Http\Controllers\ArchivoController;
use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\ProvedorController;

Route::get('/', function () {
    return view('welcome');
});

//Route::get('prenda', [PrendaController::class, 'index']);
//Route::get('ingresa', [PrendaController::class, 'create']);
//Route::post('ingresa', [PrendaController::class, 'store']);
//Route::get('/prenda-individual/{id?}', [PrendaController::class, 'show']);


Route::resource('prenda', PrendaController::class)->middleware('auth');//El Middleware sirve para que estes si o si iniciado sesion para que te deje entrar a la ruta en la que quieras hacer

Route::post('material/{material}/agrega-prenda/', [MaterialController::class, 'agregaPrenda'])->name('material.agrega-prenda')->middleware('auth');
Route::resource('material', MaterialController::class)->middleware('auth');

Route::resource('empleado', EmpleadoController::class)->middleware('auth');

Route::resource('provedor', ProvedorController::class)->middleware('auth');

//Route::resource('prenda', PrendaController::class)->except(['destroy', 'index']); Crea una ruta para cada metodo y el except las evita  

Route::get('/inicio', function () {
    return view('inicio');
})->name('inicio');

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

///google
Route::get('auth/google',[GoogleAuthController::class, 'AuthRedirect'])->name('login-google');
Route::get('auth/google/call-back',[GoogleAuthController::class, 'googleCallback']);

