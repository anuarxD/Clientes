<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PatientController;
use Illuminate\Support\Facades\Auth;

// Ruta para usuarios inactivos
Route::get('/inactive', function () {
    return view('inactive'); // Vista para usuarios inactivos
})->name('inactive');

// Ruta principal
Route::get('/', function () {
    if (auth()->check() && Auth::user()->status === 'inactivo') {
        return redirect()->route('inactive');
    }
    return view('auth.login');
})->name('login');

// Rutas de autenticación
Auth::routes();

// Ruta para el home
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])
    ->name('home')
    ->middleware(['auth', 'check.status']);

// Grupo de rutas para psicólogos
Route::middleware(['auth', 'psico', 'check.status'])->group(function () {
    Route::resource('patients', PatientController::class);
});

// Grupo de rutas para administradores
Route::middleware(['auth', 'admin', 'check.status'])->group(function () {
    Route::resource('users', UserController::class); // Gestión de usuarios
    Route::put('/users/{id}/toggle-status', [UserController::class, 'toggleStatus'])
        ->name('users.toggleStatus'); // Activar/Inactivar usuarios
});
