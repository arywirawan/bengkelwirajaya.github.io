<?php

use App\Http\Controllers\BahanController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DetilBahanController;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\LoginUserController;
use App\Http\Controllers\PesananController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ResetPasswordController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\UserController;
use App\Models\DetilBahan;
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

Route::get('/', [HomepageController::class, 'index']);
Route::get('/shop', [HomepageController::class, 'shop']);

Route::get('users', [UserController::class, 'index'])->name('users.index');

//Login
Route::get('/login', [LoginUserController::class, 'index']);
Route::post('/login', [LoginUserController::class, 'authenticate']);
Route::post('/logout', [LoginUserController::class, 'logout']);

//Register
Route::get('/register', [RegisterController::class, 'index']);
Route::post('/register', [RegisterController::class, 'simpan']);

//Reset Akun
Route::get('/reset',[ResetPasswordController::class, 'index'])->name('reset');
Route::post('/reset',[ResetPasswordController::class, 'link'])->name('reset.password');
Route::get('/reset/akun/{email}',[ResetPasswordController::class, 'password'])->name('reset.akun');
Route::put('/reset/akun/{email}',[ResetPasswordController::class, 'simpan'])->name('reset.simpan');


//Dashboard
Route::group(['prefix'=>'admin', 'middleware'=>'admin'],function(){
    Route::get('/', [DashboardController::class, 'index']);
    Route::resource('kategori', KategoriController::class);
    Route::resource('produk', ProdukController::class);
    Route::resource('customer', CustomerController::class);
    Route::resource('bahan', BahanController::class);
    Route::resource('pesanan', PesananController::class);
    Route::resource('transaksi', TransaksiController::class);
    Route::resource('detilbahan', DetilBahanController::class);
    Route::get('profil', [UserController::class, 'index']);
    Route::get('setting', [UserController::class, 'setting']);
    Route::get('laporan', [LaporanController::class, 'index']);
    Route::get('proseslaporan', [LaporanController::class, 'proses']);
    Route::get('pesanan/update_pesanan/{id}', [PesananController::class, 'show_pesanan']);
    Route::put('pesanan/update_pesanan/{id}', [PesananController::class, 'update_pesanan'])->name('update.status'); 
});
    
