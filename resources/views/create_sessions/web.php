<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SessionController;

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

// Rutas de autenticación (si las estás usando)
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Rutas para usuarios
Route::resource('users', UserController::class);

// Rutas para sesiones
Route::resource('create_sessions', SessionController::class);

// Rutas alternativas para sesiones (para mayor compatibilidad)
Route::get('/sessions', [SessionController::class, 'index'])->name('sessions.index');
Route::get('/sessions/create', [SessionController::class, 'create'])->name('sessions.create');
Route::post('/sessions', [SessionController::class, 'store'])->name('sessions.store');
Route::get('/sessions/{create_session}', [SessionController::class, 'show'])->name('sessions.show');
Route::get('/sessions/{create_session}/edit', [SessionController::class, 'edit'])->name('sessions.edit');
Route::put('/sessions/{create_session}', [SessionController::class, 'update'])->name('sessions.update');
Route::delete('/sessions/{create_session}', [SessionController::class, 'destroy'])->name('sessions.destroy');

// Ruta de prueba para verificar que las vistas funcionan
Route::get('/test-session-create', function () {
    return view('create_sessions.create');
});