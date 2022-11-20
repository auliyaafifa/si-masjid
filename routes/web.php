<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DepartemenController;
use App\Http\Controllers\KategoriPemasukanController;
use App\Http\Controllers\KategoriPengeluaranController;
use App\Http\Controllers\PemasukanController;
use App\Http\Controllers\PengeluaranController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\UserController;


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

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function () {
    Route::middleware('role:Ketua,Bendahara,Pengurus')->group(function () {
        Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
        Route::get('/pemasukan', [PemasukanController::class, 'index']);
        Route::get('/pengeluaran', [PengeluaranController::class, 'index']);
        Route::get('/laporan', [LaporanController::class, 'index']);
    });
    Route::middleware('role:Ketua,Bendahara')->group(function () {
        Route::get('/departemen', [DepartemenController::class, 'index']);
        Route::get('/departemen/create', [DepartemenController::class, 'create']);
        Route::post('/departemen/store', [DepartemenController::class, 'store']);
        Route::get('/departemen/{id}/edit', [DepartemenController::class, 'edit']);
        Route::put('/departemen/{id}', [DepartemenController::class, 'update']);
        Route::delete('/departemen/{id}', [DepartemenController::class, 'destroy']);
        
        Route::get('/kategoripemasukan', [KategoriPemasukanController::class, 'index']);
        Route::get('/kategoripemasukan/create', [KategoriPemasukanController::class, 'create']);
        Route::post('/kategoripemasukan/store', [KategoriPemasukanController::class, 'store']);
        Route::get('/kategoripemasukan/{id}/edit', [KategoriPemasukanController::class, 'edit']);
        Route::put('/kategoripemasukan/{id}', [KategoriPemasukanController::class, 'update']);
        Route::delete('/kategoripemasukan/{id}', [KategoriPemasukanController::class, 'destroy']);
        
        Route::get('/kategoripengeluaran', [KategoriPengeluaranController::class, 'index']);
        Route::get('/kategoripengeluaran/create', [KategoriPengeluaranController::class, 'create']);
        Route::post('/kategoripengeluaran/store', [KategoriPengeluaranController::class, 'store']);
        Route::get('/kategoripengeluaran/{id}/edit', [KategoriPengeluaranController::class, 'edit']);
        Route::put('/kategoripengeluaran/{id}', [KategoriPengeluaranController::class, 'update']);
        Route::delete('/kategoripengeluaran/{id}', [KategoriPengeluaranController::class, 'destroy']);
        
        Route::get('/pemasukan/create', [PemasukanController::class, 'create']);
        Route::post('/pemasukan/store', [PemasukanController::class, 'store']);
        Route::get('/pemasukan/{id}/edit', [PemasukanController::class, 'edit']);
        Route::put('/pemasukan/{id}', [PemasukanController::class, 'update']);
        Route::get('/pemasukan/{id}/show', [PemasukanController::class, 'show']);
        Route::delete('/pemasukan/{id}', [PemasukanController::class, 'destroy']);
        
        Route::get('/pengeluaran/create', [PengeluaranController::class, 'create']);
        Route::post('/pengeluaran/store', [PengeluaranController::class, 'store']);
        Route::get('/pengeluaran/{id}/edit', [PengeluaranController::class, 'edit']);
        Route::put('/pengeluaran/{id}', [PengeluaranController::class, 'update']);
        Route::get('/pengeluaran/{id}/show', [PengeluaranController::class, 'show']);
        Route::delete('/pengeluaran/{id}', [PengeluaranController::class, 'destroy']);
    });
    Route::middleware('role:Ketua')->group(function () {
        Route::get('/users', [UserController::class, 'index']);
        Route::get('/users/create', [UserController::class, 'create']);
        Route::post('/users/store', [UserController::class, 'store']);
        Route::get('/users/{id}/edit', [UserController::class, 'edit']);
        Route::put('/users/{id}', [UserController::class, 'update']);
        Route::delete('/users/{id}', [UserController::class, 'destroy']);
    });
});


Auth::routes();

Route::get('/dashboard', function () {
    return view('dashboard');
});

