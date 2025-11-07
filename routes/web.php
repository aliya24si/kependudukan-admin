<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\WargaController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PenerimaBantuanController;

// Route::get('/', function () {
//    return view('login');
// });


Route::resource('login', LoginController::class)->only(['index', 'store']);
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

// dashboard diarahkan ke view/admin/dashboard.blade.php
Route::get('/dashboard', function () { return view('pages.dashboard'); })->name('dashboard');


Route::post('/logout', function () {
    Session::flush(); // hapus semua data sesi
    return redirect('/login')->with('success', 'Berhasil logout!');
})->name('logout');

Route::resource('users', UserController::class);

Route::resource('warga', WargaController::class);

Route::resource('programs', ProgramController::class);


