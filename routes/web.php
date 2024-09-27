<?php

use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    $user = Auth::user();
    return view('welcome', compact('user'));
})->name('home')->middleware('auth');
Route::get('/register',[AuthController::class,'registerForm'])->name('registerForm');

// login routes
Route::get('/login',[AuthController::class,'loginForm'])->name('loginForm');
Route::post('/login',[AuthController::class,'handleLogin'])->name('login');


Route::post('/register',[AuthController::class,'handleRegister'])->name('register')->middleware('checkAge');

Route::delete('/logout',[AuthController::class,'logout'])->name('logout');