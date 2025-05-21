<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\PesananController;

// Halaman utama dashboard
// Halaman utama (home)
Route::get('/', function () {
    return view('dashboard'); // Atau sesuaikan dengan halaman yang diinginkan
})->name('home');


// Route CRUD Barang
Route::resource('barang', BarangController::class);
Route::get('barang/{id}', [BarangController::class, 'show'])->name('barang.show');




// Route untuk Pesanan
Route::get('/pesanan', [PesananController::class, 'index'])->name('pesanan.index');
Route::get('/pesanan/create', [PesananController::class, 'create'])->name('pesanan.create');
Route::post('/pesanan', [PesananController::class, 'store'])->name('pesanan.store');

// ⚠️ Letakkan ini sebelum yang pakai parameter {id}
Route::get('/pesanan/riwayat', [PesananController::class, 'riwayat'])->name('pesanan.riwayat');

Route::get('/pesanan/{id}', [PesananController::class, 'show'])->name('pesanan.show');
Route::get('/pesanan/{id}/cetak-struk', [PesananController::class, 'cetakStruk'])->name('pesanan.cetakStruk');
Route::delete('/pesanan/{id}', [PesananController::class, 'destroy'])->name('pesanan.destroy');

