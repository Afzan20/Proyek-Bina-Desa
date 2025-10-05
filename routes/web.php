<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home',[HomeController::class, 'index'])->name('home.index');

Route::get('/login',[LoginController::class, 'index'])->name('login.index');

Route::post('login/store',[LoginController::class, 'store'])
->name ('login.store');

Route::get('/login/success', function () {
    // Cek apakah user sudah login
    if (!session()->has('user')) {
        return redirect('/login');
    }

    return view('Login-Success');
});
