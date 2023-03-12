<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\LelangController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Auth\LoginController;

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


Auth::routes();
Route::get('/', [HomeController::class, 'index'])->name('home')->middleware('auth');
// Route::get('/', [HomeController::class, 'index'])->name('main')->middleware('auth');
// Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
    // Lelang
    Route::get('/lelang', [LelangController::class, 'index'])->name('lelang.get.index');

    // Barang
    Route::get('/barang', [BarangController::class, 'index'])->name('barang.get.index');
    Route::get('/create/barang', [BarangController::class, 'create'])->name('barang.get.create');
    Route::post('/store/barang', [BarangController::class, 'store'])->name('barang.post.store');
    Route::get('/edit/barang/{id}', [BarangController::class, 'edit'])->name('barang.get.edit');
    Route::put('/update/barang/{id}', [BarangController::class, 'update'])->name('barang.put.update');
    Route::delete('/delete/barang/{id}', [BarangController::class, 'destroy'])->name('barang.delete');

    // Petugas
    Route::get('/petugas', [UserController::class, 'indexPetugas'])->name('petugas.get.index');
});

Route::get('/lelang/{id}', [LelangController::class, 'detailLelang'])->name('detail-lelang');
Route::post('/bid/lelang/{id}', [LelangController::class, 'bid'])->name('bid');
Route::put('/open/lelang/{id}', [LelangController::class, 'bukaLelang'])->name('buka-lelang');