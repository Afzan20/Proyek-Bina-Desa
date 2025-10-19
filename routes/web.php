<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home',[HomeController::class, 'index'])->name('home.index');

Route::get('/login',[LoginController::class, 'index'])->name('login.index');

Route::post('login/store',[LoginController::class, 'login'])
->name ('login.store');

Route::get('/login/success', function () {
    if (!session()->has('user')) {
        return redirect('/login');
    }

    return view('Login-Success');
});

Route::get('/register', [LoginController::class, 'registerForm'])->name('login.register.form');
Route::post('/register', [LoginController::class, 'register'])->name('login.register');
Route::resource('kategori_aset', KategoriAset_Controller::class);
