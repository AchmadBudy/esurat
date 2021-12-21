<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SuratController;
use App\Http\Controllers\SuratKeluarController;
use App\Http\Controllers\SuratMasukController;
use Illuminate\Routing\Route as RoutingRoute;
use Illuminate\Support\Facades\Route;

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

// route dashboard
Route::get('/', [DashboardController::class, 'index'])->middleware('auth')->name('dashboard');
// route profile
Route::get('/profile', [ProfileController::class, 'index'])->middleware('auth');
Route::post('/profile', [ProfileController::class, 'ubahPassword'])->middleware('auth');
Route::get('/profile/edit', [ProfileController::class, 'editProfile'])->middleware('auth');
Route::post('/profile/edit', [ProfileController::class, 'processProfile'])->middleware('auth');
// route admin power
Route::get('/pengguna', [AdminController::class, 'pengguna'])->middleware(['auth', 'is_admin']);
Route::post('/pengguna/tambah', [AdminController::class, 'tambahPengguna'])->middleware(['auth', 'is_admin']);
Route::post('/pengguna/hapus', [AdminController::class, 'hapusPengguna'])->middleware(['auth', 'is_admin']);
Route::post('/pengguna/reset', [AdminController::class, 'resetPengguna'])->middleware(['auth', 'is_admin']);
Route::get('/jabatan', [AdminController::class, 'jabatan'])->middleware(['auth', 'is_admin']);
Route::post('/jabatan', [AdminController::class, 'tambahJabatan'])->middleware(['auth', 'is_admin']);
Route::post('/jabatan/edit', [AdminController::class, 'editJabatan'])->middleware(['auth', 'is_admin']);
Route::post('/jabatan/hapus', [AdminController::class, 'hapusJabatan'])->middleware(['auth', 'is_admin']);
// Route Surat Masuk
Route::get('/surat-masuk', [SuratMasukController::class, 'suratMasuk'])->middleware(['auth']);
Route::get('/surat-masuk/tambah', [SuratMasukController::class, 'tambahSuratMasuk'])->middleware(['auth']);
Route::post('/surat-masuk/tambah', [SuratMasukController::class, 'storeSuratMasuk'])->middleware(['auth']);
Route::post('/surat-masuk/hapus', [SuratMasukController::class, 'hapusSuratMasuk'])->middleware(['auth']);
Route::post('/surat-masuk/edit', [SuratMasukController::class, 'editedSuratMasuk'])->middleware(['auth']);
Route::get('/surat-masuk/edit/{id}', [SuratMasukController::class, 'editSuratMasuk'])->middleware(['auth']);
// Route Surat Keluar
Route::get('/surat-keluar', [SuratKeluarController::class, 'suratKeluar'])->middleware(['auth']);
Route::get('/surat-keluar/tambah', [SuratKeluarController::class, 'tambahSuratKeluar'])->middleware(['auth']);
Route::post('/surat-keluar/tambah', [SuratKeluarController::class, 'storeSuratKeluar'])->middleware(['auth']);
Route::post('/surat-keluar/hapus', [SuratKeluarController::class, 'storeSuratKeluar'])->middleware(['auth']);
Route::get('/surat-keluar/edit/{id}', [SuratKeluarController::class, 'editSuratKeluar'])->middleware(['auth']);
Route::post('/surat-keluar/edit', [SuratKeluarController::class, 'editedSuratKeluar'])->middleware(['auth']);


// route auth
Route::get('/login', [LoginController::class, 'index'])->middleware('guest')->name('login');
Route::get('/logout', [LoginController::class, 'logout'])->middleware('auth');
Route::post('/login', [LoginController::class, 'authenticate'])->middleware('guest')->name('logout');
