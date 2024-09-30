<?php

use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Models\Post;
use App\Models\User;

Route::get('/', function () {

    $user = User::find(2); // auth user
    $post = Post::findOrFail(3); // ozining posti
    if ($user->id != $post->user_id) {
        return 'Siz faqat o\'zingizning postingizni o\'chira olasiz';
    }
    $post->delete();


    return 'Post yangilandi';
})->name('home');
Route::get('/register',[AuthController::class,'registerForm'])->name('registerForm');

// login routes
Route::get('/login',[AuthController::class,'loginForm'])->name('loginForm');
Route::post('/login',[AuthController::class,'handleLogin'])->name('login');


Route::post('/register',[AuthController::class,'handleRegister'])->name('register')->middleware('checkAge');

Route::delete('/logout',[AuthController::class,'logout'])->name('logout');