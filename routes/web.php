<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AsetController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LokasiAsetController;
use App\Http\Controllers\MutasiAsetController;
use App\Http\Controllers\KategoriAsetController;
use App\Http\Controllers\PemeliharaanAsetController;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [LoginController::class, 'index'])->name('login.index');
Route::post('/login', [LoginController::class, 'login'])->name('login.store');

Route::get('/register', [LoginController::class, 'registerForm'])->name('login.register.form');
Route::post('/register', [LoginController::class, 'register'])->name('login.register');

Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

// Route untuk home
Route::get('/home', function () {
    return view('admin/dashboard');
})->name('home.index');

Route::get('/register', [LoginController::class, 'registerForm'])->name('login.register.form');
Route::post('/register', [LoginController::class, 'register'])->name('login.register');
Route::resource('aset', AsetController::class);
Route::resource('kategori_aset', KategoriAsetController::class);
Route::resource('lokasi_aset', LokasiAsetController::class);
Route::resource('pemeliharaan_aset', PemeliharaanAsetController::class);
Route::resource('mutasi_aset', MutasiAsetController::class);
