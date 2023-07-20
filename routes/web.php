<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StockController;
use App\Http\Controllers\PartnershipController;
use App\Http\Controllers\PengirimanController;
use App\Http\Controllers\PemesananController;
use App\Http\Controllers\BelanjaController;
use App\Http\Controllers\PembelianController;
use App\Http\Controllers\RiwayatPenjualanController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\EditProfileController;




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

Route::get('/', function () {
    return view('layouts.app');
});
Route::get('/', function () {
    return view('welcome');
});

Route::get('/beranda', [HomeController::class, 'index'])->name('beranda');
Route::get('/home', [HomeController::class, 'index'])->name('home');


Auth::routes();


Route::get('/beranda', [HomeController::class, 'index'])->name('beranda');
Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::group(['middleware' => ['auth','checkRole:customer,kurir,owner,cabang']], function(){
    //beranda
Route::get('/beranda', [HomeController::class, 'index'])->name('beranda');
Route::get('/home', [HomeController::class, 'index'])->name('home');


//partnership
Route::get('/partnership', [PartnershipController::class, 'index'])->name('partnership.index');
Route::get('/partnership/{id}', [PartnershipController::class, 'show'])->name('partnership.show');

//profil
Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
Route::put('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
Route::delete('/profile', [ProfileController::class,'destroy'])->name('profile.destroy');
Route::get('/profile/edit-password', [ProfileController::class, 'editPassword'])->name('profile.editPassword');
Route::put('/profile/update-password', [ProfileController::class, 'updatePassword'])->name('profile.updatePassword');
});

Route::group(['middleware' => ['auth','checkRole:cabang']], function(){
    //stock
Route::get('/stock', [StockController::class, 'index'])->name('stock.index');
Route::post('/stock', [StockController::class, 'store'])->name('stock.store');
Route::get('/stock/{id}/edit', [StockController::class, 'edit'])->name('stock.edit');
Route::put('/stock/{id}', [StockController::class, 'update'])->name('stock.update');
Route::delete('/stock/{id}', [StockController::class, 'destroy'])->name('stock.destroy');

//pemesanan
Route::get('/pemesanan', [PemesananController::class, 'index'])->name('pemesanan.index');
Route::put('/pemesanan/{id}', [PemesananController::class, 'update'])->name('pemesanan.update');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/pemesanan', [PemesananController::class, 'index'])->name('pemesanan.index');
Route::put('/pemesanan/{id_pemesanan}/update-status', [PemesananController::class, 'updateStatus'])->name('pemesanan.updateStatus');
});

Route::group(['middleware' => ['auth','checkRole:kurir']], function(){
    //pengiriman
Route::get('/pengiriman', [PengirimanController::class, 'index'])->name('pengiriman.index');
Route::put('/pengiriman/{id}', [PengirimanController::class, 'update'])->name('pengiriman.update');
});


Route::group(['middleware' => ['auth','checkRole:owner']], function(){
    //rute untuk riwayat penjualan
Route::get('/riwayat-penjualan', [RiwayatPenjualanController::class, 'index'])->name('riwayat-penjualan.index');
});
    
Route::group(['middleware' => ['auth','checkRole:customer']], function(){
    //belanja
Route::get('/belanja', [BelanjaController::class, 'index'])->name('belanja.index');
Route::post('/belanja/pesan', [BelanjaController::class, 'pesan'])->name('belanja.pesan');
Route::get('/fetch-barang/{cabangId}', [BelanjaController::class, 'fetchBarang'])->name('belanja.fetchBarang');
Route::get('/fetch-barang-detail/{barangId}', [BelanjaController::class, 'fetchBarangDetail'])->name('belanja.fetchBarangDetail');
Route::get('/fetch-nomor-rekening/{cabangId}', [BelanjaController::class, 'fetchNomorRekening']);

// Rute untuk riwayat pembelian
Route::get('/riwayat-pembelian', [PembelianController::class, 'riwayatPembelian'])->name('riwayat.pembelian')->middleware('auth');
});
























/*
//beranda
Route::get('/beranda', [HomeController::class, 'index'])->name('beranda');
//stock
Route::get('/stock', [StockController::class, 'index'])->name('stock.index');
Route::post('/stock', [StockController::class, 'store'])->name('stock.store');
Route::get('/stock/{id}/edit', [StockController::class, 'edit'])->name('stock.edit');
Route::put('/stock/{id}', [StockController::class, 'update'])->name('stock.update');
Route::delete('/stock/{id}', [StockController::class, 'destroy'])->name('stock.destroy');

//partnership
Route::get('/partnership', [PartnershipController::class, 'index'])->name('partnership.index');
Route::get('/partnership/{id}', [PartnershipController::class, 'show'])->name('partnership.show');

//pemesanan
//pemesanan
Route::get('/pemesanan', [PemesananController::class, 'index'])->name('pemesanan.index');
Route::put('/pemesanan/{id}', [PemesananController::class, 'update'])->name('pemesanan.update');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/pemesanan', [PemesananController::class, 'index'])->name('pemesanan.index');
Route::put('/pemesanan/{id_pemesanan}/update-status', [PemesananController::class, 'updateStatus'])->name('pemesanan.updateStatus');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//pengiriman
Route::get('/pengiriman', [PengirimanController::class, 'index'])->name('pengiriman.index');
Route::put('/pengiriman/{id}', [PengirimanController::class, 'update'])->name('pengiriman.update');

//profil
Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
Route::put('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
Route::delete('/profile', [ProfileController::class,'destroy'])->name('profile.destroy');
Route::get('/profile/edit-password', [ProfileController::class, 'editPassword'])->name('profile.editPassword');
Route::put('/profile/update-password', [ProfileController::class, 'updatePassword'])->name('profile.updatePassword');

//belanja
Route::get('/belanja', [BelanjaController::class, 'index'])->name('belanja.index');
Route::post('/belanja/pesan', [BelanjaController::class, 'pesan'])->name('belanja.pesan');
Route::get('/fetch-barang/{cabangId}', [BelanjaController::class, 'fetchBarang'])->name('belanja.fetchBarang');
Route::get('/fetch-barang-detail/{barangId}', [BelanjaController::class, 'fetchBarangDetail'])->name('belanja.fetchBarangDetail');
Route::get('/fetch-nomor-rekening/{cabangId}', [BelanjaController::class, 'fetchNomorRekening']);

// Rute untuk riwayat pembelian
Route::get('/riwayat-pembelian', [PembelianController::class, 'riwayatPembelian'])->name('riwayat.pembelian')->middleware('auth');

//rute untuk riwayat penjualan
Route::get('/riwayat-penjualan', [RiwayatPenjualanController::class, 'index'])->name('riwayat-penjualan.index');



Route::post('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');
















/*


Route::get('/', function () {
    return view('layouts.app');
});
Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::group(['middleware' => ['auth', 'checkRole:cabang']], function () {

//beranda
Route::get('/beranda', [HomeController::class, 'index'])->name('beranda');
//stock
Route::get('/stock', [StockController::class, 'index'])->name('stock.index');
Route::post('/stock', [StockController::class, 'store'])->name('stock.store');
Route::get('/stock/{id}/edit', [StockController::class, 'edit'])->name('stock.edit');
Route::put('/stock/{id}', [StockController::class, 'update'])->name('stock.update');
Route::delete('/stock/{id}', [StockController::class, 'destroy'])->name('stock.destroy');

//partnership
Route::get('/partnership', [PartnershipController::class, 'index'])->name('partnership.index');
Route::get('/partnership/{id}', [PartnershipController::class, 'show'])->name('partnership.show');

//pemesanan
Route::get('/pemesanan', [PemesananController::class, 'index'])->name('pemesanan.index');
Route::put('/pemesanan/{id}', [PemesananController::class, 'update'])->name('pemesanan.update');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//profil
Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
Route::put('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
Route::delete('/profile', [ProfileController::class,'destroy'])->name('profile.destroy');
Route::get('/profile/edit-password', [ProfileController::class, 'editPassword'])->name('profile.editPassword');
Route::put('/profile/update-password', [ProfileController::class, 'updatePassword'])->name('profile.updatePassword');

Route::post('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');


});

// Routes for Owner
Route::group(['middleware' => ['auth', 'checkRole:owner']], function () {

    Route::get('/home', [HomeController::class, 'index'])
    ->middleware(['auth'])
    ->name('home');

Route::get('/beranda', [HomeController::class, 'index'])->name('beranda');
//partnership
Route::get('/partnership', [PartnershipController::class, 'index'])->name('partnership.index');
Route::get('/partnership/{id}', [PartnershipController::class, 'show'])->name('partnership.show');

//profil
Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
Route::put('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
Route::delete('/profile', [ProfileController::class,'destroy'])->name('profile.destroy');
Route::get('/profile/edit-password', [ProfileController::class, 'editPassword'])->name('profile.editPassword');
Route::put('/profile/update-password', [ProfileController::class, 'updatePassword'])->name('profile.updatePassword');

//rute untuk riwayat penjualan
Route::get('/riwayat-penjualan', [RiwayatPenjualanController::class, 'index'])->name('riwayat-penjualan.index');

Route::post('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');

});


// Routes for Kurir
Route::group(['middleware' => ['auth', 'checkRole:kurir']], function () {

    Route::get('/home', [HomeController::class, 'index'])
    ->middleware(['auth'])
    ->name('home');
   
//pengiriman
Route::get('/pengiriman', [PengirimanController::class, 'index'])->name('pengiriman.index');
Route::put('/pengiriman/{id}', [PengirimanController::class, 'update'])->name('pengiriman.update');

Route::get('/beranda', [HomeController::class, 'index'])->name('beranda');

//partnership
Route::get('/partnership', [PartnershipController::class, 'index'])->name('partnership.index');
Route::get('/partnership/{id}', [PartnershipController::class, 'show'])->name('partnership.show');

//profil
Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
Route::put('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
Route::delete('/profile', [ProfileController::class,'destroy'])->name('profile.destroy');
Route::get('/profile/edit-password', [ProfileController::class, 'editPassword'])->name('profile.editPassword');
Route::put('/profile/update-password', [ProfileController::class, 'updatePassword'])->name('profile.updatePassword');

Route::post('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');

});

//routes for customer
Route::group(['middleware' => ['auth', 'checkRole:customer']], function () {

    Route::get('/home', [HomeController::class, 'index'])
    ->middleware(['auth'])
    ->name('home');

//profil
Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
Route::put('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
Route::delete('/profile', [ProfileController::class,'destroy'])->name('profile.destroy');
Route::get('/profile/edit-password', [ProfileController::class, 'editPassword'])->name('profile.editPassword');
Route::put('/profile/update-password', [ProfileController::class, 'updatePassword'])->name('profile.updatePassword');

//partnership
Route::get('/partnership', [PartnershipController::class, 'index'])->name('partnership.index');
Route::get('/partnership/{id}', [PartnershipController::class, 'show'])->name('partnership.show');

//belanja
Route::get('/belanja', [BelanjaController::class, 'index'])->name('belanja.index');
Route::post('/belanja/pesan', [BelanjaController::class, 'pesan'])->name('belanja.pesan');
Route::get('/fetch-barang/{cabangId}', [BelanjaController::class, 'fetchBarang'])->name('belanja.fetchBarang');
Route::get('/fetch-barang-detail/{barangId}', [BelanjaController::class, 'fetchBarangDetail'])->name('belanja.fetchBarangDetail');
Route::get('/fetch-nomor-rekening/{cabangId}', [BelanjaController::class, 'fetchNomorRekening']);

// Rute untuk riwayat pembelian
Route::get('/riwayat-pembelian', [PembelianController::class, 'riwayatPembelian'])->name('riwayat.pembelian')->middleware('auth');

Route::get('/beranda', [HomeController::class, 'index'])->name('beranda');

Route::post('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');

});

*/