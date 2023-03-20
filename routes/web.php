<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PrendaController;

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

Route::resource('prenda', PrendaController::class);


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
