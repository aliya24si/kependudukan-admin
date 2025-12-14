<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\WargaController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PendaftarController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\PenerimaBantuanController;
use App\Http\Controllers\RiwayatPenyaluranController;
use App\Http\Controllers\VerifikasiLapanganController;

Route::get('/', function () {
    return redirect('login');
});

Route::resource('login', LoginController::class)->only(['index', 'store']);
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

// dashboard diarahkan ke view/admin/dashboard.blade.php
Route::get('/dashboard', [DashboardController::class, 'index'])
    ->name('dashboard')
    ->middleware('checkislogin');

Route::post('/logout', function () {
    Session::flush(); // hapus semua data sesi
    return redirect('/login')->with('success', 'Berhasil logout!');
})->name('logout');

Route::group(['middleware' => ['checkrole:admin']], function () {
    Route::resource('users', UserController::class);
    /** List Route Lainnya */
});

Route::resource('warga', WargaController::class);

Route::resource('programs', ProgramController::class);
Route::delete('/programs/media/{media}', [ProgramController::class, 'deleteMedia'])
    ->name('programs.media.destroy');

Route::resource('pendaftar', PendaftarController::class);
Route::delete('/pendaftar/media/{media}',
    [PendaftarController::class, 'deleteMedia']
)->name('pendaftar.media.destroy');

// ppppppppp

Route::resource('verifikasi', VerifikasiLapanganController::class);
Route::delete('/verifikasi/media/{media}', [VerifikasiLapanganController::class, 'deleteMedia'])->name('verifikasi.media.delete');

Route::resource('penerima', PenerimaBantuanController::class);

Route::resource('riwayat', RiwayatPenyaluranController::class);
Route::delete('riwayat/media/{media}', [RiwayatPenyaluranController::class, 'deleteMedia'])
    ->name('riwayat.media.delete');


Route::get('/register', [RegisterController::class, 'show'])
    ->name('register');

Route::post('/register', [RegisterController::class, 'store'])
    ->name('register.store');
