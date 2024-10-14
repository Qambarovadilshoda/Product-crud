<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\RegisterRequest;

class AuthController extends Controller
{
    public function loginForm(){
        return view('auth.login');
    }
    public function registerForm(){
        return view('auth.register');
    }
    public function login(Request $request){
       $user = User::where('email', $request->email)->first();
       if(!Hash::check($request->password,$user->password)){
        return redirect()->back();

       }

       Auth::login($user);
       return redirect()->route('products.index');

    }
    public function register(RegisterRequest $request){
        $user = User::create([
            'name'=> $request->name,
            'email'=> $request->email,
            'age'=>$request->age,
            'password'=> bcrypt($request->password),

        ]);
        Auth::login($user);
        return redirect()->route('products.index');
    }
    public function logout(){
        Auth::logout();
        return redirect()->route('loginForm');
    }        
}
