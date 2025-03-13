<?php

use App\Http\Controllers\Authentication;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('dashboard.index');
})->name('Home');


Route::get('/login',function(){
    return view('dashboard.auth.login');
});



Route::prefix('auth')->name('auth.')->group(function(){
    Route::get('/login',[Authentication::class, 'doLogin'])->name('LoginGet');
    Route::get('/register',[Authentication::class, 'doRegist'])->name('RegisterGet');
    Route::post('/login',[Authentication::class, 'login'])->name('LoginPost');
    Route::post('/register', [Authentication::class, 'register'])->name('RegisterPost');
});
