<?php
use App\Http\Controllers\contohController;
use App\Http\Controllers\ProdukController;
use Illuminate\Support\Facades\Route;

// Route utama
Route::get('/', function () {
    return view('welcome');
});

Route::get('/index', function () {
    return view('index');
});

// Route untuk percobaan1
Route::get('/percobaan1',[contohController::class,'TampilContoh']);

// Menggunakan Route Resource untuk Produk
Route::resource('produk', ProdukController::class);
