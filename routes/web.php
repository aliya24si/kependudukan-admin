<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PenerimaBantuanController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/penerima/create', [PenerimaBantuanController::class, 'create'])->name('penerima.create'); // Form input
Route::post('/penerima/store', [PenerimaBantuanController::class, 'store'])->name('penerima.store');   // Simpan ke session
Route::get('/penerima', [PenerimaBantuanController::class, 'index'])->name('penerima.index');          // Tampilkan data

