<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\PerusahaanController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AdminLokerController;
use App\Http\Controllers\Admin\AdminPrakerinController;
use App\Http\Controllers\Admin\AdminPerusahaanController;
use App\Http\Controllers\Admin\AdminSiswaController;
use App\Http\Controllers\Admin\AdminAlumniController;
use App\Http\Controllers\Auth\LoginAuthController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::post('/postlogin', [LoginAuthController::class, 'postlogin'])->name('postlogin');
Route::post('/postloginadmin', [LoginAuthController::class, 'postloginadmin'])->name('postloginadmin');
Route::get('/siswa/logout', [LoginAuthController::class, 'logout'])->name('logout');

Route::get('/', [HomeController::class, 'index']);
Route::get('/lowongan', [HomeController::class, 'lowongan']);
Route::get('/perusahaan', [HomeController::class, 'perusahaan']);
Route::get('/perusahaan/{id}', [HomeController::class, 'perusahaan']);
Route::get('/perusahaan/detail', [HomeController::class, 'detailperusahaan']);
Route::get('/prakerin', [HomeController::class, 'prakerin']);

Route::get('/siswa-registrasi', [SiswaController::class, 'siswaregistrasi']);
Route::get('/siswa-login', [SiswaController::class, 'siswalogin'])->name('siswa-login');

Route::get('/perusahaan-profil', [PerusahaanController::class, 'index']);
Route::get('/perusahaan-loker', [PerusahaanController::class, 'perusahaanloker']);
Route::get('/perusahaan-prakerin', [PerusahaanController::class, 'perusahaanprakerin']);
Route::get('/perusahaan-registrasi', [PerusahaanController::class, 'perusahaanregistrasi']);
Route::get('/perusahaan-login', [PerusahaanController::class, 'perusahaanlogin']);
Route::get('/pelamar-loker', [PerusahaanController::class, 'pelamarloker']);


Route::get('/admin-login', [AdminController::class, 'login']);
Route::middleware(['auth:user'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin');
    Route::get('/admin/loker', [AdminLokerController::class, 'index'])->name('admin.loker');
    Route::get('/admin/prakerin', [AdminPrakerinController::class, 'index']);
    Route::get('/admin/perusahaan', [AdminPerusahaanController::class, 'index']);
    Route::get('/admin/siswa', [AdminSiswaController::class, 'index']);
    Route::get('/admin/siswa/add', [AdminSiswaController::class, 'addsiswa']);
    Route::post('/admin/siswa/actionadd', [AdminSiswaController::class, 'insert']);
    Route::get('/admin/siswa/edit/{id_siswa}', [AdminSiswaController::class, 'editSiswa']);
    Route::post('/admin/siswa/actionupdate/{id_siswa}', [AdminSiswaController::class, 'actionUpdate']);
    Route::get('/admin/alumni', [AdminAlumniController::class, 'index']);
});

Route::group(['middleware' => ['auth:siswa,alumni']], function() {
    Route::get('/siswa-profil', [SiswaController::class, 'siswaprofil']);
    Route::get('/siswa-loker', [SiswaController::class, 'siswaloker']);
    Route::get('/siswa-prakerin', [SiswaController::class, 'siswaprakerin']);
});