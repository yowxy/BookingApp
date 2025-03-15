<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\Login;
use App\Http\Requests\Auth\Register;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class Authentication extends Controller
{
    public function doLogin()
    {
        return view('dashboard.auth.login');
    }


    public function doRegist()
    {
        return view('dashboard.auth.register');
    }


    public function login(Login $request)
    {
        $credentials = $request->only('email','password');
        if(Auth::attempt($credentials)){
            return redirect()->route(' Dashnboard');
        };


        return back()->withErrors(['email' => 'Email atau password salah.']);

    }



    public function register(Register $request)
    {
        $validatedData =  $request->validated();
        $validatedData['password'] = bcrypt($validatedData['password']);

        $user = User::create($validatedData);

        Auth::login($user);
        return redirect()->route(' Dashnboard')->withSuccess('Great! You have Successfully logged in');

    }
}
