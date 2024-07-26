<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SessionController;

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
Route::get('/perencanaan', [HomeController::class, 'perencanaan']);
Route::get('/pembelajaran', [HomeController::class, 'pembelajaran']);

Route::get('/session', [SessionController::class, 'index'])->name('login');
Route::post('/session/login', [SessionController::class, 'login']);


// Route::get('/', function () {
//     return view('welcome');
// });
