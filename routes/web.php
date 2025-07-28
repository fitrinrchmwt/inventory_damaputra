<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KelolaProdukController;
use App\Http\Controllers\KelolaBahanController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\BahanBakuController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LaporanProdukController;
use App\Http\Controllers\LaporanBahanController;

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
Route::post('/login', [LoginController::class, 'proses_cek_login_db']);
Route::get('/lupapassword', [LoginController::class, 'lupa_password']);

Route::get('/user', [UserController::class, 'kelola_user']);
Route::post('/register', [UserController::class, 'store']);
Route::put('/user/update', [UserController::class, 'update']);
Route::delete('/user/delete/{id}', [UserController::class, 'destroy']);

Route::get('/profile', [UserController::class, 'index']);
Route::get('/riwayat-login', [UserController::class, 'riwayatLogin']);

Route::get('/', [LoginController::class, 'index']);

Route::get('/dashboard', [DashboardController::class, 'dashboard']);

Route::get('/kelolaprodukmasuk', [KelolaProdukController::class, 'produk_masuk']);
Route::get('/kelolaprodukkeluar', [KelolaProdukController::class, 'produk_keluar']);

// Halaman produk masuk
//Route::get('/produkmasuk', [KelolaProdukController::class, 'produk_masuk']);

// Simpan pencatatan produk masuk
// web.php
Route::post('/produkmasuk/create', [KelolaProdukController::class, 'tambah_produk_masuk']);
Route::post('/produkkeluar/create', [KelolaProdukController::class, 'tambah_produk_keluar']);

Route::post('/bahanmasuk/create', [KelolaBahanController::class, 'tambah_bahan_masuk']);
Route::post('/bahankeluar/create', [KelolaBahanController::class, 'tambah_bahan_keluar']);

// Ambil nama produk berdasarkan ID produk (digunakan oleh AJAX)
Route::get('/produk/get-nama/{id}', [KelolaProdukController::class, 'getNamaProduk'])->name('produk.get-nama');


Route::get('/kelolabahanmasuk', [KelolaBahanController::class, 'bahan_masuk']);
Route::get('/kelolabahankeluar', [KelolaBahanController::class, 'bahan_keluar']);

Route::get('/produk', [ProdukController::class, 'list_produk']);
Route::get('/bahanbaku', [BahanBakuController::class, 'list_bahan']);

Route::post('/produk/create',[ProdukController::class, 'tambah_produk']);
//Route::get('/updateproduk/{id_produk}', [ProdukController::class, 'edit']);
Route::post('/produk/update', [ProdukController::class, 'update_produk']);
Route::delete('/hapusproduk/{id_produk}', [ProdukController::class, 'hapus_produk'])->name('produk.delete');

// Route untuk menghapus produk
//Route::delete('/hapusproduk/{id}', [ProdukController::class, 'destroy'])->name('produk.delete');



Route::post('/bahan/create',[BahanBakuController::class, 'tambah_bahan']);
//Route::get('/updatebahan/{id_produk}', [ProdukController::class, 'edit']);
Route::post('/bahan/update', [BahanBakuController::class, 'update_bahan']);
Route::delete('/hapusbahan/{id_bahan}', [BahanBakuController::class, 'hapus_bahan'])->name('bahan.delete');

Route::get('/profile', [UserController::class, 'index']);
Route::get('/user', [UserController::class, 'kelola_user']);
Route::get('/tes-session', function(){
    return Session::all();
});

//laporan
Route::get('/laporanproduk', [LaporanProdukController::class, 'laporan_produk']);
Route::get('/rekap-produk', [LaporanProdukController::class, 'rekapproduk']);
Route::get('/laporan-produk/excel', [LaporanProdukController::class, 'produk_Excel']);
Route::get('/laporan-produk/pdf', [LaporanProdukController::class, 'produk_pdf']);

//laporan bahan baku
Route::get('/laporanbahan', [LaporanBahanController::class, 'laporan_bahan']);
Route::get('/rekap-bahan', [LaporanBahanController::class, 'rekapbahan']);
Route::get('/laporan-bahan/excel', [LaporanBahanController::class, 'bahan_Excel']);
Route::get('/laporan-bahan/pdf', [LaporanBahanController::class, 'bahan_pdf']);

//Route::get('/produk/create', [ProdukController::class, 'create']);

//Route::get('/produk/form/{id_produk}', [ProdukController::class, 'edit']);
//Route::post('/produk/update', [ProdukController::class, 'update_produk']);

Route::get('/produk-masuk/filter', [KelolaProdukController::class, 'filterProdukMasuk']);
Route::get('/produk-keluar/filter', [KelolaProdukController::class, 'filterProdukKeluar']);

Route::get('/bahan-masuk/filter', [KelolaBahanController::class, 'filterBahanMasuk']);
Route::get('/bahan-keluar/filter', [KelolaBahanController::class, 'filterBahanKeluar']);


Route::get('/dashboard/terbaru', [DashboardController::class, 'getTerbaru']);

//pencarian data 
Route::get( '/produk/filter', [ProdukController::class, 'filterProduk']);
Route::get( '/bahan/filter', [BahanBakuController::class, 'filterBahan']);