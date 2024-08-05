<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\KontributorController;

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

// Home & Main Page
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/beranda/pelaksanaan', [HomeController::class, 'pelaksanaan']);
Route::get('/beranda/monitoring', [HomeController::class, 'monitoring']);
Route::get('/beranda/dampak', [HomeController::class, 'dampak']);

Route::get('/perencanaan', [HomeController::class, 'perencanaan']);

Route::get('/pembelajaran', [HomeController::class, 'pembelajaran']);

Route::get('/session', [SessionController::class, 'index'])->name('login');
Route::post('/session/login', [SessionController::class, 'login']);

Route::get('/kontributor', [KontributorController::class, 'index'])->name('kontributor');
Route::get('/kontributor/indikator/tambah', [KontributorController::class, 'inputIndikator'])->name('kontributor');
Route::get('/kontributor/kegiatan', [KontributorController::class, 'kegiatan'])->name('kontributor');
Route::get('/kontributor/kegiatan/tambah', [KontributorController::class, 'inputKegiatan'])->name('kontributor');

Route::get('/admin', [AdminController::class, 'index'])->name('admin');
Route::get('/admin/indikator/edit', [AdminController::class, 'editIndikator']);
// Route::put('/admin/indikator/{id}', [AdminController::class, 'updateIndikator']);
// Route::delete('/admin/indikator/{id}', [AdminController::class, 'deleteIndikator']);
Route::get('/admin/indikator/verifikasi', [AdminController::class, 'verifikasiIndikator']);
Route::put('/admin/indikator/verify/{id}', [AdminController::class, 'approveIndikator']);
Route::put('/admin/indikator/reject/{id}', [AdminController::class, 'rejectIndikator']);

Route::get('/admin/kegiatan', [AdminController::class, 'daftarKegiatan']);
// Route::get('/admin/kegiatan/cari', [AdminController::class, 'cariKegiatan']);
Route::get('/admin/kegiatan/edit', [AdminController::class, 'editKegiatan']);
// Route::put('/admin/kegiatan/{id}/{p}', [AdminController::class, 'updateKegiatan']);
Route::get('/admin/kegiatan/verifikasi', [AdminController::class, 'verifikasiKegiatan']);
Route::put('/admin/kegiatan/verify/{id}', [AdminController::class, 'approveKegiatan']);
Route::put('/admin/kegiatan/reject/{id}', [AdminController::class, 'rejectKegiatan']);

Route::get('/admin/tambah-kegiatan', [AdminController::class, 'tambahKegiatan']);

// Route::get('/', function () {
//     return view('welcome');
// });
