<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\WargaController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PenerimaBantuanController;

Route::get('/', function () {
   return view('welcome');
});

Route::get('/penerima/create', [PenerimaBantuanController::class, 'create'])->name('penerima.create'); // Form input
Route::post('/penerima/store', [PenerimaBantuanController::class, 'store'])->name('penerima.store');   // Simpan ke session
Route::get('/penerima', [PenerimaBantuanController::class, 'index'])->name('penerima.index');          // Tampilkan data

Route::get('/auth', [AuthController::class, 'index']);
Route::post('/auth/login', [AuthController::class, 'login']);





Route::resource('login', LoginController::class)->only(['index', 'store']);

// dashboard diarahkan ke view/admin/dashboard.blade.php
Route::get('/dashboard', function () { return view('admin.dashboard'); })->name('dashboard');

Route::post('/logout', function () {
    Session::flush(); // hapus semua data sesi
    return redirect('/login')->with('success', 'Berhasil logout!');
})->name('logout');

Route::resource('users', UserController::class);




Route::get('/program', [ProgramController::class, 'index'])->name('event.index');
Route::post('/program/store', [ProgramController::class, 'store'])->name('event.store');
Route::get('/program/{id}/edit', [ProgramController::class, 'edit'])->name('event.edit');
Route::put('/program/{id}', [ProgramController::class, 'update'])->name('event.update');
Route::delete('/program/{id}', [ProgramController::class, 'destroy'])->name('event.destroy');




Route::get('/warga', [WargaController::class, 'index'])->name('warga.index');
Route::post('/warga', [WargaController::class, 'store'])->name('warga.store');
Route::get('/warga/{id}/edit', [WargaController::class, 'edit'])->name('warga.edit');
Route::put('/warag/{id}', [WargaController::class, 'update'])->name('warga.update');
Route::delete('/warga/{id}', [WargaController::class, 'destroy'])->name('warga.destroy');




Route::get('/about', [DashboardController::class, 'about'])->name('about');
Route::get('/service', [DashboardController::class, 'service'])->name('service');
Route::get('/donation', [DashboardController::class, 'donation'])->name('donation');
//Route::get('/event', [DashboardController::class, 'event'])->name('event');
//Route::get('/feature', [DashboardController::class, 'feature'])->name('feature');
Route::get('/team', [DashboardController::class, 'team'])->name('team');
Route::get('/testimonial', [DashboardController::class, 'testimonial'])->name('testimonial');
//Route::get('/contact', [DashboardController::class, 'contact'])->name('contact');
Route::get('/404', [DashboardController::class, 'error'])->name('404');

















//buat controller satu stau per satu file view untuk mengatur form yang akan di buat, tetapi fokus aja pada file dashboard dan event(Program bantuan)
