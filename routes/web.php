<?php

use App\Models\Post;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::get('/register', [AuthController::class, 'registerForm'])->name('registerForm')->middleware('auth');
Route::post('/register',[AuthController::class,'register'])->name('handleRegister');
Route::get('/', [AuthController::class, 'loginForm'])->name('loginForm')->middleware('auth');
Route::post('/login', [AuthController::class,'login'])->name('handleLogin');
Route::delete('/logout',[AuthController::class,'logout'])->name('logout');

Route::resource('/products', ProductController::class)->middleware('checkAuth');