<?php

use App\Http\Controllers\AbsensiController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SimulasiCucian;
use App\Http\Controllers\SimulasiGaji;
use App\Http\Controllers\SimulasiPenjualan;
use App\Http\Controllers\SimulasiTransaksiBarang;
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

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::resource('absensi', AbsensiController::class);
Route::resource('absensi', AbsensiController::class);

// simulasi
Route::get('simulasi-gaji',[SimulasiGaji::class, 'index'])->name('simulasi-gaji');
Route::get('simulasi-cucian',[SimulasiCucian::class, 'index'])->name('simulasi-cucian');
Route::get('simulasi-penjualan',[SimulasiPenjualan::class, 'index'])->name('simulasi-penjualan');

// TO Pemrograman Dasar 2023
Route::get('simulasi-transaksi-barang',[SimulasiTransaksiBarang::class, 'index'])->name('simulasi-transaksi-barang');


