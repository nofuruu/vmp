<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\MusicController;
// Route::get('/', function () {
//     return view('auth.login');
// });

// Route::middleware('noauth')->group(function () {
Route::get('/', [LoginController::class, 'index']);
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::get('/register', [LoginController::class, 'register'])->name('register');
Route::post('/set-session', [LoginController::class, 'setSession'])->name('setSession');
// });

// Route::middleware('auth.custom')->group(function () {
Route::get('/dashboard', [UserController::class, 'dashboard'])->name('users.dashboard');
// });

Route::get('/msmusic', [MusicController::class, 'index'])->name('msmusic.page');
Route::get('/addmusic', [MusicController::class, 'add'])->name('music.add');


