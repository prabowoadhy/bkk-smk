<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\PerusahaanController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminLokerController;
use App\Http\Controllers\AdminPrakerinController;
use App\Http\Controllers\AdminPerusahaanController;
use App\Http\Controllers\AdminSiswaController;
use App\Http\Controllers\AdminAlumniController;
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

Route::post('/postlogin', [LoginAuthController::class, 'postlogin'])->name('postlogin');
Route::post('/postloginadmin', [LoginAuthController::class, 'postloginadmin'])->name('postloginadmin');
Route::get('/admin-login', [AdminController::class, 'login']);
// Auth::routes();
Route::middleware(['auth:user'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin');
    Route::get('/admin/loker', [AdminLokerController::class, 'index'])->name('admin.loker');
    Route::get('/admin/prakerin', [AdminPrakerinController::class, 'index']);
    Route::get('/admin/perusahaan', [AdminPerusahaanController::class, 'index']);
    Route::get('/admin/siswa', [AdminSiswaController::class, 'index']);
    Route::get('/admin/alumni', [AdminAlumniController::class, 'index']);
    
});

Route::group(['middleware' => ['auth:siswa,alumni']], function() {
    Route::get('/siswa-profil', [SiswaController::class, 'siswaprofil']);
    Route::get('/siswa-loker', [SiswaController::class, 'siswaloker']);
    Route::get('/siswa-prakerin', [SiswaController::class, 'siswaprakerin']);
    
});
Route::get('/siswa/logout', [LoginAuthController::class, 'logout'])->name('logout');