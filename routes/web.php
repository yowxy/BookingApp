<?php

use App\Http\Controllers\Authentication;
use App\Http\Controllers\Dashboard as ControllersDashboard;
use App\Http\Controllers\Dashnboard;
use App\Http\Controllers\MidtransController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\RentalPSController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('dashboard.dashboard');
})->name('Home');


Route::get('/login',function(){
    return view('dashboard.auth.login');
});


Route::get('/', [ ControllersDashboard::class, 'index'])->name(name: ' Dashnboard');
Route::get('/payment',[PaymentController::class, 'index'])->name('payment');
Route::post('/payment',[PaymentController::class, 'createTransaction'])->name('createTransaction');
Route::delete('/payment/{id}', [PaymentController::class, 'destroy'])->name('payment.destroy');
// Route::delete('/destroy/{id}',[RentalPSController])

Route::post('/midtrans-callback', [MidtransController::class, 'handleNotification']);
Route::get('/user',[ControllersDashboard::class, 'user'])->name('user.index');


Route::prefix('rental')->name('rental.')->group(function(){
    Route::get('/index',[RentalPSController::class, 'index'])->name('index');
    Route::get('/create',[RentalPSController::class, 'create'])->name('create');
    Route::post('/create', [RentalPSController::class, 'store'])->name('store');
    Route::delete('/destroy/{id}',[RentalPSController::class, 'destroy'])->name('destroy');
});



Route::prefix('auth')->name('auth.')->group(function(){
    Route::get('/login',[Authentication::class, 'doLogin'])->name('LoginGet');
    Route::get('/register',[Authentication::class, 'doRegist'])->name('RegisterGet');
    Route::post('/login',[Authentication::class, 'login'])->name('LoginPost');
    Route::post('/register', [Authentication::class, 'register'])->name('RegisterPost');
    Route::get('/logout',[Authentication::class, 'logout'])->name('logout');
});
