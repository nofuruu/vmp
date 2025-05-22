<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\MusicController;
use App\Http\Controllers\ProfileController;

Route::middleware(['noauth', 'prevent-back-history'])->group(function () {
    Route::get('/', [LoginController::class, 'index']);
    Route::get('/login', [LoginController::class, 'index'])->name('login');
    Route::get('/register', [LoginController::class, 'register'])->name('register');
    Route::post('/set-session', [LoginController::class, 'setSession'])->name('setSession');
});

Route::middleware(['auth.custom', 'prevent-back-history'])->group(function () {
    //logout
    Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
    Route::get('/dashboard', [UserController::class, 'dashboard'])->name('users.dashboard');
    //Profile
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
    //Master Music
    Route::get('/msmusic', [MusicController::class, 'index'])->name('msmusic.page');
    Route::get('/addmusic', [MusicController::class, 'add'])->name('music.add');
    
});
