<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login()
    {
        return view('front.login');
    }

    public function loginproses(Request $request)
    {
        if(Auth::attempt($request->only('email','password'))) {
            return redirect()->route('dashboard');
        }
        return redirect('/login');
    }

    public function register()
    {
        return view('front.register');
    }

    public function registeruser(Request $request)
    {
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'remember_token' => Str::random(60),
        ]);
        return redirect('/login');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        return redirect('login');
    }



}