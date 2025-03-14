<?php

use App\Http\Controllers\Authentication;
use App\Http\Controllers\Dashboard as ControllersDashboard;
use App\Http\Controllers\Dashnboard;
use App\Http\Controllers\RentalPSController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('dashboard.dashboard');
})->name('Home');


Route::get('/login',function(){
    return view('dashboard.auth.login');
});


Route::get('/', [ ControllersDashboard::class, 'index'])->name(' Dashnboard');

Route::prefix('rental')->name('rental.')->group(function(){
    Route::get('/index',[RentalPSController::class, 'index'])->name('index');
});



Route::prefix('auth')->name('auth.')->group(function(){
    Route::get('/login',[Authentication::class, 'doLogin'])->name('LoginGet');
    Route::get('/register',[Authentication::class, 'doRegist'])->name('RegisterGet');
    Route::post('/login',[Authentication::class, 'login'])->name('LoginPost');
    Route::post('/register', [Authentication::class, 'register'])->name('RegisterPost');
});
