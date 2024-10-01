<?php

use App\Http\Controllers\contohController;
use App\Http\Controllers\ProdukController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/index', function () {
    return view('index');
});
//Route::get('/percobaan1', function () {
//    return view('percobaan1');
//});
Route::get('/percobaan1',[contohController::class,'TampilContoh']);
/*Route::get('/produk', function () {
    return view('produk');
});
*/
Route::get('/produk',[ProdukController::class,'ViewProduk']);