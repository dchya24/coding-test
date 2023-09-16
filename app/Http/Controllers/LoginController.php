<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLoginPage(){
        return view('login');
    }

    public function login(LoginRequest $request){
        $data = $request->except('_token');

        if (Auth::attempt($data)) {
            $request->session()->regenerate();

            return redirect()->intended('dashboard');
        }

        return back()->with("error", "Invalid Credentials")->onlyInput('email');
    }

    public function logout(){
        Auth::logout();

        return redirect('login');
    }
}
