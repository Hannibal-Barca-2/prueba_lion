<?php

use App\Http\Controllers\SalasController;
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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Route::get('/salas', [App\Http\Controllers\SalasController::class, 'index'])->name('salas');
Route::get('/salas/crear', [App\Http\Controllers\SalasController::class, 'create'])->name('salas.crear');
Route::get('/juntas/crear', [App\Http\Controllers\JuntasController::class, 'create'])->name('juntas.crear');
Route::resource('salas', SalasController::class);
Route::post('/traerhoras', [App\Http\Controllers\JuntasController::class, 'traerHoras'])->name('traerHoras');
Route::get('salas/eliminar/{id}', [SalasController::class, 'destroy'])->name('salas.eliminar');
Route::post('/', [App\Http\Controllers\SalasController::class, 'store'])->name('salas.guardar');