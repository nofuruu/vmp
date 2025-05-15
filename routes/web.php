<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Auth\LoginController;

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::get('/register', [LoginController::class, 'register'])->name('register');



Route::get('/dashboard', [UserController::class, 'dashboard'])->name('users.dashboard');
