<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function registerForm(){
        return view("auth.register");
    }

    public function handleRegister(StoreUserRequest $request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email; 
        $user->password = bcrypt($request->password);
        $user->save();
       
        Auth::login($user);

        return redirect("/");
    }

    public function logout(){
        Auth::logout();

        return redirect("/");
    }

    public function loginForm(){
        return view("auth.login");
    }

    public function handleLogin(Request $request){

        $request->validate([
                "email"=> "required|exists:users,email",
            ]);
        
            $user = User::where("email", $request->email)->first();
            if(Hash::check($request->password, $user->password)){
                
                Auth::attempt(["email"=> $request->email,"password"=> $request->password]);

                return redirect("/");
            }else{
                return 'Incorrect Password';
            }
    }
}
