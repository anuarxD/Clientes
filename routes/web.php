<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Auth\RegisteredUserController;


Route::get('/', function () {
    if (auth()->check()) {
        return redirect()->route('home');
    }
    return view('auth.login');
});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth', 'admin'])->group(function () {
    Route::resource('users', UserController::class); // Esta ruta solo la podrá acceder el Administrador
    Route::get('register', [RegisteredUserController::class, 'create'])->name('register');

});

