<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\AlumniController;
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
Route::post('/alumnipostlogin', [LoginAuthController::class, 'alumnipostlogin'])->name('alumnipostlogin');
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

Route::get('/alumni-login', [AlumniController::class, 'alumnilogin'])->name('alumni-login');

Route::get('/perusahaan-profil', [PerusahaanController::class, 'index']);
Route::get('/perusahaan-loker', [PerusahaanController::class, 'perusahaanloker']);
Route::get('/perusahaan-prakerin', [PerusahaanController::class, 'perusahaanprakerin']);
Route::get('/perusahaan-registrasi', [PerusahaanController::class, 'perusahaanregistrasi']);
Route::get('/perusahaan-login', [PerusahaanController::class, 'perusahaanlogin']);
Route::get('/pelamar-loker', [PerusahaanController::class, 'pelamarloker']);
Route::get('/admin-login', [AdminController::class, 'login'])->name('admin-login');

Route::middleware(['admin:user'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin');
    Route::get('/admin/prakerin', [AdminPrakerinController::class, 'index']);
    Route::get('/admin/siswa', [AdminSiswaController::class, 'index']);
    Route::get('/admin/siswa/add', [AdminSiswaController::class, 'addsiswa']);
    Route::post('/admin/siswa/actionadd', [AdminSiswaController::class, 'insert']);
    Route::get('/admin/siswa/edit/{id_siswa}', [AdminSiswaController::class, 'editSiswa']);
    Route::post('/admin/siswa/actionupdate/{id_siswa}', [AdminSiswaController::class, 'actionUpdate']);
    Route::get('/admin/alumni', [AdminAlumniController::class, 'index']);
    Route::get('/admin/alumni/addform', [AdminAlumniController::class, 'addform']);
    Route::post('/admin/alumni/addaction', [AdminAlumniController::class, 'addaction']);
    Route::get('/admin/alumni/editform/{id}', [AdminAlumniController::class, 'editform']);
    Route::post('/admin/alumni/editaction/{id}', [AdminAlumniController::class, 'editaction']);
    Route::get('/admin/perusahaan', [AdminPerusahaanController::class, 'index']);
    Route::get('/admin/perusahaan/addform', [AdminPerusahaanController::class, 'addform']);
    Route::post('/admin/perusahaan/addaction', [AdminPerusahaanController::class, 'addaction']);
    Route::get('/admin/perusahaan/editform/{id}', [AdminPerusahaanController::class, 'editform']);
    Route::post('/admin/perusahaan/editaction/{id}', [AdminPerusahaanController::class, 'editaction']);
    Route::get('/admin/loker', [AdminLokerController::class, 'index'])->name('admin.loker');
    Route::get('/admin/loker/addform', [AdminLokerController::class, 'addform']);
    Route::post('/admin/loker/addaction', [AdminLokerController::class, 'addaction']);
    Route::get('/admin/loker/editform/{id}', [AdminLokerController::class, 'editform']);
    Route::post('/admin/loker/editaction/{id}', [AdminLokerController::class, 'editaction']);
    Route::get('/admin/loker/pelamar/{id}', [AdminLokerController::class, 'pelamarloker']);
    Route::get('/admin/prakerin/addform', [AdminPrakerinController::class, 'addform']);
    Route::post('/admin/prakerin/addaction', [AdminPrakerinController::class, 'addaction']);
    Route::get('/admin/prakerin/editform/{id}', [AdminPrakerinController::class, 'editform']);
    Route::post('/admin/prakerin/editaction/{id}', [AdminPrakerinController::class, 'editaction']);
    Route::get('/admin/prakerin/pelamar/{id}', [AdminPrakerinController::class, 'pelamarprakerin']);
});

Route::group(['middleware' => ['auth:siswa,alumni']], function() {
});

Route::group(['middleware' => ['siswa:siswa']], function() {
    Route::post('/siswalamaraction', [SiswaController::class, 'siswalamaraction']);
    Route::post('/siswa/actionupdate/{id_siswa}', [SiswaController::class, 'actionUpdate']);
    Route::get('/siswa-profil', [SiswaController::class, 'siswaprofil']);
    Route::get('/prakerin/detail/{id}', [HomeController::class, 'prakerindetail']);
    Route::get('/siswa-prakerin', [SiswaController::class, 'siswaprakerin']);
    Route::get('/alumni-loker', [AlumniController::class, 'alumniloker']);
    
});
Route::group(['middleware' => ['alumni:alumni']], function() {
    Route::get('/lowongan/detail/{id}', [HomeController::class, 'lokerdetail']);
    Route::get('/alumni-loker', [AlumniController::class, 'alumniloker']);
    Route::get('/alumni-profil', [AlumniController::class, 'alumniprofil']);
    Route::post('/alumnilamaraction', [AlumniController::class, 'alumnilamaraction']);
    
});