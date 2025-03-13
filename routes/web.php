<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('dashboard.index');
});


Route::get('/login',function(){
    return view('dashboard.auth.login');
});

Route::get('/register', function(){
    return view('dashboard.auth.register');
});
