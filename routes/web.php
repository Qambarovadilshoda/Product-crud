<?php

use App\Models\Post;
use App\Http\Controllers\ProductController;
use App\Models\User;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::resource('products', ProductController::class)->middleware('checkAuth');
Route::get('register', [AuthController::class, 'registerForm'])->name('registerForm');
Route::post('/register',[AuthController::class,'register'])->name('register');
Route::get('login', [AuthController::class, 'loginForm'])->name('loginForm');
Route::post('/login', [AuthController::class,'login'])->name('login');
Route::delete('/logout',[AuthController::class,'logout'])->name('logout');
