<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk; // Tambahkan ini untuk mengimpor model Produk
use App\Http\Requests\StoreProdukRequest; // Pastikan ini benar
use App\Http\Requests\UpdateProdukRequest; // Pastikan ini benar

class ProdukController extends Controller
{
    public function ViewProduk(){
        $produk = Produk::all();
        return view('produk', ['produk' => $produk]);
    }
}
