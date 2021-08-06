<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SiswaController;

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
Route::get('/siswa-profil', [SiswaController::class, 'index']);
Route::get('/siswa-loker', [SiswaController::class, 'siswaloker']);
Route::get('/siswa-prakerin', [SiswaController::class, 'siswaprakerin']);