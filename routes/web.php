<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KelolaProdukController;
use App\Http\Controllers\KelolaBahanController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\BahanBakuController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LaporanProdukController;
use App\Http\Controllers\LaporanBahanController;

Route::get('/', [LoginController::class, 'index']);
Route::get('/lupapassword', [LoginController::class, 'lupa_password']);
Route::get('/dashboard', [DashboardController::class, 'dashboard']);

Route::get('/kelolaprodukmasuk', [KelolaProdukController::class, 'produk_masuk']);
Route::get('/kelolaprodukkeluar', [KelolaProdukController::class, 'produk_keluar']);
Route::get('/kelolabahanmasuk', [KelolaBahanController::class, 'bahan_masuk']);
Route::get('/kelolabahankeluar', [KelolaBahanController::class, 'bahan_keluar']);

Route::get('/produk', [ProdukController::class, 'list_produk']);
Route::get('/bahanbaku', [BahanBakuController::class, 'list_bahan']);

Route::post('/tambahproduk',[ProdukController::class, 'tambah_produk']);
Route::patch('/updateproduk', [ProdukController::class, 'update_produk']);
Route::delete('/hapusproduk', [ProdukController::class, 'hapus_produk']);


Route::post('/bahan/create',[BahanBakuController::class, 'tambah_bahan']);
Route::post('/updatebahan', [BahanBakuController::class, 'update_bahan']);
Route::delete('/hapusbahan', [BahanBakuController::class, 'hapus_bahan']);

Route::get('/profile', [UserController::class, 'index']);
Route::get('/user', [UserController::class, 'kelola_user']);
Route::get('/laporanproduk', [LaporanProdukController::class, 'index']);
Route::get('/laporanbahan', [LaporanBahanController::class, 'index']);


