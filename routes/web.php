<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\JurusanController;
use App\Http\Controllers\MataKuliahController;

Route::get('/', function () {
    return redirect()->route('mahasiswa.profil');
});

Route::get('/profil', [MahasiswaController::class, 'profil'])
    ->name('mahasiswa.profil');

Route::get('/mahasiswa', [MahasiswaController::class, 'daftar'])
    ->name('mahasiswa.daftar');

Route::get('/mahasiswa/{nim}', [MahasiswaController::class, 'detail'])
    ->name('mahasiswa.detail');

Route::get('/tes-halaman', function () {
    return 'Laravel berhasil menampilkan halaman!';
});

// Menampilkan daftar jurusan
Route::get('/jurusan', [JurusanController::class, 'index'])
    ->name('jurusan.index');

// Menampilkan form tambah jurusan
Route::get('/jurusan/create', [JurusanController::class, 'create'])
    ->name('jurusan.create');

// Memproses dan menyimpan data jurusan
Route::post('/jurusan', [JurusanController::class, 'store'])
    ->name('jurusan.store');

// Menampilkan detail jurusan
Route::get('/jurusan/{id}', [JurusanController::class, 'show'])
    ->name('jurusan.show');

// Menampilkan seluruh data mata kuliah
Route::get('/matakuliah', [MataKuliahController::class, 'index'])
    ->name('matakuliah.index');

// Menampilkan form tambah mata kuliah
Route::get('/matakuliah/create', [MataKuliahController::class, 'create'])
    ->name('matakuliah.create');

// Memproses dan menyimpan data mata kuliah
Route::post('/matakuliah', [MataKuliahController::class, 'store'])
    ->name('matakuliah.store');

// Menampilkan detail mata kuliah berdasarkan ID
Route::get('/matakuliah/{id}', [MataKuliahController::class, 'show'])
    ->name('matakuliah.show');
