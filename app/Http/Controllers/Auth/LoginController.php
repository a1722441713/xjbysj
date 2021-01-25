<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;


class LoginController extends Controller
{
    public function showFormLogin(){
        return view('auth.login');
    }

    public function login(LoginRequest $request){
        $validated = $request->validated();
        $credentials = $request->only('email','password');
        if(Auth::attempt($credentials)){
            return redirect()->route('show.backend.form');
        }
        return redirect()->back();
    }

    public function loginOut(){
        Auth::logout();
        return redirect()->route('show.login.form');
    }
}
