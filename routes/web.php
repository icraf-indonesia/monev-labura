<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\KontributorController;
use App\Http\Controllers\PDFController;
use Illuminate\Support\Facades\File;

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
Route::get('/', [HomeController::class, 'index'])->name('beranda');
Route::get('/beranda/pelaksanaan', [HomeController::class, 'pelaksanaan']);
Route::get('/beranda/monitoring', [HomeController::class, 'monitoring']);
Route::get('/beranda/dampak', [HomeController::class, 'dampak']);
Route::get('/unduh', [HomeController::class, 'unduh']);
Route::get('/perencanaan', [HomeController::class, 'perencanaan']);
Route::get('/export-pdf', [PDFController::class, 'exportPDF']);
Route::get('/export-pdf-keluaran', [PDFController::class, 'exportPDFKeluaran']);
Route::get('/map', [HomeController::class, 'map']);

Route::get('/session', [SessionController::class, 'index'])->name('login');
Route::post('/session/login', [SessionController::class, 'login']);

Route::group(['middleware' => 'auth'], function(){
Route::get('/kontributor', [KontributorController::class, 'index'])->name('kontributor');
Route::get('komponen/{id}', [KontributorController::class, 'komponen']);
Route::get('indikator/{id}', [KontributorController::class, 'indikator']);
Route::get('/get-indikators', [KontributorController::class, 'getIndikators']);
Route::get('/get-indikator-detail', [KontributorController::class, 'getIndikatorDetail']);
Route::get('/get-satuan-target/{id}', [KontributorController::class, 'getSatuanTarget']);
Route::get('/kontributor/indikator/{id}/edit', [KontributorController::class, 'editIndikator'])->name('indikator.edit');
Route::put('/kontributor/indikator/{id}', [KontributorController::class, 'updateIndikator'])->name('indikator.update');
Route::get('/kontributor/kegiatan/{id}/edit', [KontributorController::class, 'editKegiatan'])->name('kegiatan.edit');
Route::put('/kontributor/kegiatan/{id}', [KontributorController::class, 'updateKegiatan'])->name('kegiatan.update');
Route::get('/export-csv', [KontributorController::class, 'exportToExcel'])->name('export.csv');

Route::get('/kontributor/capaian/tambah', [KontributorController::class, 'tambahCapaian']);
Route::post('/kontributor/store', [KontributorController::class, 'store']);
Route::post('/kontributor/store_indikator', [KontributorController::class, 'storeIndikator']);
Route::post('/kontributor/store_kegiatan', [KontributorController::class, 'storeKegiatan']);
Route::get('/kontributor/indikator/view-document/{filename}', function($filename) {
    $path = storage_path('app/public/dokumen/' . $filename);
    
    if (!File::exists($path)) {
        abort(404);
    }

    return response()->file($path);
})->name('view.document');

Route::get('/kontributor/indikator/tambah', [KontributorController::class, 'inputIndikator'])->name('addIndikator');
Route::get('/kontributor/kegiatan', [KontributorController::class, 'kegiatan'])->name('kegiatan');
Route::get('/kontributor/kegiatan/tambah', [KontributorController::class, 'inputKegiatan'])->name('addKegiatan');
Route::get('/get-kegiatan', [KontributorController::class, 'getKegiatan']);

Route::get('/admin', [AdminController::class, 'index'])->name('admin');
Route::get('/admin/indikator/{id}/edit', [AdminController::class, 'editIndikator'])->name('admin.indikator.edit');
Route::put('/admin/indikator/{id}', [AdminController::class, 'updateIndikator'])->name('admin.indikator.update');
Route::get('/admin/indikator/verifikasi', [AdminController::class, 'verifikasiIndikator']);
Route::post('/admin/approve/{id}', [AdminController::class, 'approveIndikator'])->name('admin.approve');
Route::post('/admin/reject/{id}', [AdminController::class, 'rejectIndikator'])->name('admin.reject');
Route::get('/admin/indikator/view-document/{filename}', function($filename) {
    $path = storage_path('app/public/dokumen/' . $filename);
    
    if (!File::exists($path)) {
        abort(404);
    }

    return response()->file($path);
})->name('view.document');

Route::get('/admin/kegiatan', [AdminController::class, 'daftarKegiatan'])->name('admin.kegiatan');
Route::get('/admin/kegiatan/{id}/edit', [AdminController::class, 'editKegiatan']);
Route::put('/admin/kegiatan/{id}', [AdminController::class, 'updateKegiatan']);
Route::get('/admin/kegiatan/verifikasi', [AdminController::class, 'verifikasiKegiatan']);
Route::post('/admin/kegiatan/approve/{id}', [AdminController::class, 'approveKegiatan'])->name('admin.kegiatan.approve');
Route::post('/admin/kegiatan/reject/{id}', [AdminController::class, 'rejectKegiatan'])->name('admin.kegiatan.reject');
Route::post('/admin/kegiatan', [AdminController::class, 'storeKegiatan'])->name('admin.kegiatan.store');

Route::get('/admin/tambah-kegiatan', [AdminController::class, 'tambahKegiatan']);
Route::get('/admin/get-programs/{komponen_id}', [AdminController::class, 'getPrograms']);
Route::get('/admin/get-kegiatans/{program_id}', [AdminController::class, 'getKegiatans']);
Route::get('/admin/get-subkegiatans/{kegiatan_id}', [AdminController::class, 'getSubkegiatans']);

Route::get('/session/logout', [SessionController::class, 'logout'])->name('logout');

});