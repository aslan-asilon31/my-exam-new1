<?php

use App\Livewire\Welcome;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::get('/register', \App\Livewire\Auth\Register::class)->name('register');



Route::post('/logout', [App\Http\Controllers\Auth\AuthenticatedSessionController::class, 'destroy'])
    ->name('logout');


Route::get('/', \App\Livewire\Auth\Login::class)->name('login');


Route::middleware('auth:sanctum')->group(function () {
    // Route::post('/logout', [\App\Http\Controllers\Api\AuthController::class, 'logout']);


    # admin
    Route::get('/laporan', \App\Livewire\Admin\Laporan\Laporan::class)->name('laporan');

    Route::get('/dasbor', \App\Livewire\Admin\Dasbor\Dasbor::class)->name('dasbor');
    Route::get('/dasbor-user', \App\Livewire\User\DasborUser\DasborUser::class)->name('dasbor-user');

    Route::get('/asesmen-evaluator', \App\Livewire\Admin\AsesmenEvaluator\DaftarAsesmenEvaluator::class);
    Route::get('/asesmen-evaluator/buat', \App\Livewire\Admin\AsesmenEvaluator\PerbaharuiAsesmenEvaluator::class)->name('buat-asesmen-evaluator');
    Route::get('/asesmen-evaluator/ubah/{id}', \App\Livewire\Admin\AsesmenEvaluator\UbahAsesmenEvaluator::class)->name('ubah-asesmen-evaluator');

    Route::get('/asesmen-partisipan', \App\Livewire\Admin\AsesmenPartisipan\DaftarAsesmenPartisipan::class)->name('daftar-asesmen-partisipan');

    Route::get('/penilaian-asesmen', \App\Livewire\Admin\PenilaianAsesmen\DaftarPenilaianAsesmen::class)->name('daftar-penilaian-asesmen');
    Route::get('/penilaian-asesmen/{id}', \App\Livewire\Admin\PenilaianAsesmen\PenilaianAsesmenCrud::class)->name('daftar-penilaian-asesmen-detail');
    Route::get('/penilaian-asesmen-detail/{id}', \App\Livewire\Admin\PenilaianAsesmen\DaftarDetailPenilaianAsesmen::class)->name('daftar-detail-penilaian-asesmen');
    Route::get('/penilaian-asesmen/{id}/readonly', \App\Livewire\Admin\PenilaianAsesmen\PenilaianAsesmenCrud::class)->name('penilaian-asesmen-crud-ubah')->defaults('readonly', true);

    Route::get('/laporan-asesmen', \App\Livewire\Admin\LaporanAsesmen\DaftarLaporanAsesmen::class)->name('daftar-laporan-asesmen');

    Route::get('/role', App\Livewire\Admin\Role\RoleList::class)->name('role');
    Route::get('/role/create', App\Livewire\Admin\Role\RoleCrud::class)->name('role-create');
    Route::get('/role/edit/{id}', App\Livewire\Admin\Role\RoleCrud::class)->name('role-edit');

    Route::get('/permission', App\Livewire\Admin\Permission\PermissionList::class)->name('permission');
    Route::get('/permission/create', App\Livewire\Admin\Permission\PermissionCrud::class)->name('permission-crud');
    Route::get('/permission/edit/{id}', App\Livewire\Admin\Permission\PermissionCrud::class)->name('permission-crud');

    Route::get('/profil', App\Livewire\Admin\Profil\Profil::class)->name('profil');


    # halaman pengguna admin
    Route::get('/hasil-asesmen', \App\Livewire\User\HasilAsesmen\DaftarHasilAsesmen::class)->name('daftar-hasil-asesmen');

    # peserta
    Route::get('/daftar-asesmen', \App\Livewire\Asesmen\DaftarAsesmen::class)->name('daftar-asesmen');
    Route::get('/konfirmasi-mulai/{id}', \App\Livewire\Asesmen\KonfirmasiMulai::class)->name('konfirmasi-mulai');
    Route::get('/soal-asesmen/{id}', \App\Livewire\Asesmen\SoalAsesmen::class)->name('soal-asesmen');
    Route::get('/konfirmasi-selesai', \App\Livewire\Asesmen\KonfirmasiSelesai::class)->name('konfirmasi-selesai');


    Route::get('/try-asesmen', \App\Livewire\TryAsesmen::class)->name('try-asesmen');


});
