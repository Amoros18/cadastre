<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(){
        return view('auth.login');
    }
    public function dologin(LoginRequest $request){
        $credentials = $request->validated();

        if (Auth::attempt($credentials)){
            $request->session()->regenerate();
            return redirect()->intended(route('home'));
        }
        return to_route('auth.login')->withErrors([
            'email'=>"email invalide"
        ])->onlyInput('email');
    }

    public function logout(){
        Auth::logout();
        return redirect()->intended(route('auth.login'));
    }
}
