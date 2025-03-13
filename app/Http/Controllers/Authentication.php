<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\Login;
use App\Http\Requests\Auth\Register;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class Authentication extends Controller
{
    public function login(Login $request)
    {
        $credentials = $request->only('email','password');
        if(Auth::attempt($credentials)){
            return redirect()->route('dashboard.index');
        };


        return back()->withErrors(['email' => 'Email atau password salah.']);

    }



    public function register(Register $request)
    {
        $credentials =  $request->validated();
        $credentials['password'] = bcrypt($credentials['password']);

        $user = User::create($credentials);

        Auth::login($user);
    }
}
