<?php

use App\Livewire\Welcome;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', Welcome::class);
Route::get('/', \App\Livewire\Auth\Login::class)->name('login');
Route::get('/register', \App\Livewire\Auth\Register::class)->name('register');

# admin
Route::get('/dasbor', \App\Livewire\Admin\Dasbor\Dasbor::class)->name('dashbor');

// Route::get('/asesmen-evaluator', \App\Livewire\Admin\AsesmenEvaluator\DaftarAsesmenEvaluator::class)->name('daftar-asesmen-evaluator');
Route::get('/asesmen-evaluator', \App\Livewire\Admin\AsesmenEvaluator\DaftarAsesmenEvaluator::class);
Route::get('/asesmen-evaluator/buat', \App\Livewire\Admin\AsesmenEvaluator\PerbaharuiAsesmenEvaluator::class)->name('buat-asesmen-evaluator');
Route::get('/asesmen-evaluator/ubah/{id}', \App\Livewire\Admin\AsesmenEvaluator\UbahAsesmenEvaluator::class)->name('ubah-asesmen-evaluator');

Route::get('/asesmen-partisipan', \App\Livewire\Admin\AsesmenPartisipan\DaftarAsesmenPartisipan::class)->name('daftar-asesmen-partisipan');

Route::get('/hasil-asesmen', \App\Livewire\Admin\HasilAsesmen\DaftarHasilAsesmen::class)->name('daftar-hasil-asesmen');

Route::get('/laporan-asesmen', \App\Livewire\Admin\LaporanAsesmen\DaftarLaporanAsesmen::class)->name('daftar-laporan-asesmen');

// Route::get('/pengguna', \App\Livewire\Admin\DaftarAsesmen::class)->name('asesmen-evaluator');

// Route::get('/daftar-pertanyaan', \App\Livewire\Admin\Pertanyaan\DaftarPertanyaan::class)->name('daftar-pertanyaan');
// Route::get('/pengguna', \App\Livewire\Admin\Pengguna\DaftarPengguna::class)->name('daftar-pengguna');
// Route::get('/roles', \App\Livewire\Admin\DaftarAsesmen::class)->name('role');
// Route::get('/permissions', \App\Livewire\Admin\DaftarAsesmen::class)->name('permission');




# customer
Route::get('/daftar-asesmen', \App\Livewire\Asesmen\DaftarAsesmen::class)->name('daftar-asesmen');
Route::get('/konfirmasi-mulai/{id}', \App\Livewire\Asesmen\KonfirmasiMulai::class)->name('konfirmasi-mulai');
Route::get('/soal-asesmen/{id}', \App\Livewire\Asesmen\SoalAsesmen::class)->name('soal-asesmen');
Route::get('/konfirmasi-selesai', \App\Livewire\Asesmen\KonfirmasiSelesai::class)->name('konfirmasi-selesai');

