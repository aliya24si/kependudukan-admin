<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
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

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::get('/about', [DashboardController::class, 'about'])->name('about');
Route::get('/service', [DashboardController::class, 'service'])->name('service');
Route::get('/donation', [DashboardController::class, 'donation'])->name('donation');
Route::get('/event', [DashboardController::class, 'event'])->name('event');
Route::get('/feature', [DashboardController::class, 'feature'])->name('feature');
Route::get('/team', [DashboardController::class, 'team'])->name('team');
Route::get('/testimonial', [DashboardController::class, 'testimonial'])->name('testimonial');
Route::get('/contact', [DashboardController::class, 'contact'])->name('contact');
Route::get('/404', [DashboardController::class, 'error'])->name('404');

















//buat controller satu stau per satu file view untuk mengatur form yang akan di buat, tetapi fokus aja pada file dashboard dan event(Program bantuan)
