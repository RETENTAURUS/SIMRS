<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PengajuanController;

Route::post('/pengajuan/store', [PengajuanController::class, 'store'])->name('pengajuan.store');
Route::get('/tambah', [PengajuanController::class, 'tambah'])->name('tambah');
Route::get('/ubah', [PengajuanController::class, 'ubah'])->name('ubah');
Route::get('/hapus', [PengajuanController::class, 'hapus'])->name('hapus');
Route::get('/daftar', [PengajuanController::class, 'daftar'])->name('daftar');
Route::get('/dashboardA', [PengajuanController::class, 'dashboardA'])->name('dashboardA');
// Route untuk menampilkan daftar pengajuan
Route::get('/daftar-pengajuan', [PengajuanController::class, 'daftar'])->name('daftar');

// Route untuk memperbarui status pengajuan
Route::post('/update-status/{id}', [PengajuanController::class, 'updateStatus'])->name('update.status');
Route::get('/pengajuan/report/{id}', [PengajuanController::class, 'viewReport'])->name('view.report');


Route::get('/', function () {
    return view('form');
});
