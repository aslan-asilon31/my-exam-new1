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
Route::get('/admin-daftar-asesmen', \App\Livewire\Admin\Asesmen\DaftarAsesmen::class)->name('admin-daftar-asesmen');
Route::get('/daftar-pertanyaan', \App\Livewire\Admin\Pertanyaan\DaftarPertanyaan::class)->name('daftar-pertanyaan');
Route::get('/pengguna', \App\Livewire\Admin\Pengguna\DaftarPengguna::class)->name('daftar-pengguna');
Route::get('/roles', \App\Livewire\Admin\Asesmen\DaftarAsesmen::class)->name('role');
Route::get('/permissions', \App\Livewire\Admin\Asesmen\DaftarAsesmen::class)->name('permission');

# customer
Route::get('/daftar-asesmen', \App\Livewire\Asesmen\DaftarAsesmen::class)->name('daftar-asesmen');
Route::get('/konfirmasi-mulai/{id}', \App\Livewire\Asesmen\KonfirmasiMulai::class)->name('konfirmasi-mulai');
Route::get('/soal-asesmen/{id}', \App\Livewire\Asesmen\SoalAsesmen::class)->name('soal-asesmen');
Route::get('/konfirmasi-selesai', \App\Livewire\Asesmen\KonfirmasiSelesai::class)->name('konfirmasi-selesai');

