<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

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

// Ruta para probar la conexión a la base de datos
Route::get('/test-db-connection', function () {
    try {
        DB::connection()->getPdo();
        $dbName = DB::connection()->getDatabaseName();
        
        return "Conexión exitosa a la base de datos: " . $dbName;
    } catch (\Exception $e) {
        return "Error de conexión a la base de datos: " . $e->getMessage();
    }
});

// Project Controllers
use App\Http\Controllers\ProjectController;
Route::resource('projects', ProjectController::class)->except(['show']);

use App\Http\Controllers\UserController;
Route::resource('users', UserController::class);
Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');

use App\Http\Controllers\TaskController;
Route::resource('tasks', TaskController::class);


use App\Http\Controllers\SessionController;
Route::resource('create_sessions', SessionController::class);

use App\Http\Controllers\MembershipController;
Route::resource('memberships', MembershipController::class);

use App\Http\Controllers\RegisterController;
Route::get('/register', [RegisterController::class, 'create'])->name('register.create');
Route::post('/register', [RegisterController::class, 'store'])->name('register.store');

Route::get('/test-session-create', function () {
    return view('create_sessions.create');
});

use App\Http\Controllers\LoginController;
// Rutas de autenticación
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');