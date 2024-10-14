<?php

use App\Models\Post;
use App\Http\Controllers\ProductController;
use App\Models\User;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
$user = User::create([
    'name'=> 'fubwieufb',
    'email'=> uniqid()."@gmail.com",
    'password'=> Hash::make('hdh'),
    
]);
return $user;
})->name('home');

Route::resource('products', ProductController::class);
