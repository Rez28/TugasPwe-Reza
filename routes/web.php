<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\contohController;
use App\Http\Controllers\ProdukController;
use Illuminate\Support\Facades\Route;

// Route untuk login dan register
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Route untuk user
Route::middleware(['auth:web', 'user-access:user'])->prefix('user')->group(function() {
    Route::get('/percobaan1', [contohController::class, 'TampilContoh'])->name('user.percobaan1');
    
    Route::prefix('produk')->group(function() {
        Route::get('/', [ProdukController::class, 'index'])->name('produk.index.user');
        Route::get('/create', [ProdukController::class, 'create'])->name('produk.create.user');
        Route::post('/store', [ProdukController::class, 'store'])->name('produk.store.user');
        Route::get('/edit/{id}', [ProdukController::class, 'edit'])->name('produk.edit.user');
        Route::put('/update/{id}', [ProdukController::class, 'update'])->name('produk.update.user');
    });
    // Menambahkan route laporan untuk user
    Route::get('/laporan', [ProdukController::class, 'Viewlaporan'])->name('laporan.index.user');
    Route::get('/laporan/report', [ProdukController::class, 'print'])->name('laporan.print.user');
});


// Route untuk admin
Route::middleware(['auth:web', 'user-access:admin'])->prefix('admin')->group(function() {
    Route::get('/percobaan1', [contohController::class, 'TampilContoh'])->name('admin.percobaan1');
    
    Route::prefix('produk')->group(function() {
        Route::get('/', [ProdukController::class, 'index'])->name('produk.index.admin');
        Route::get('/create', [ProdukController::class, 'create'])->name('produk.create.admin');
        Route::get('/produk', [ProdukController::class, 'index'])->name('produk.index.admin');
        Route::post('/store', [ProdukController::class, 'store'])->name('produk.store.admin');
        Route::get('/edit/{id}', [ProdukController::class, 'edit'])->name('produk.edit.admin');
        Route::put('/update/{id}', [ProdukController::class, 'update'])->name('produk.update.admin');
        Route::delete('/produk/delete/{id}', [ProdukController::class, 'destroy'])->name('produk.destroy');
    });

    // Menambahkan route laporan untuk admin
    Route::get('/laporan', [ProdukController::class, 'Viewlaporan'])->name('laporan.index.admin');
    Route::get('/laporan/report', [ProdukController::class, 'print'])->name('laporan.print.admin');
});
