<?php

namespace App\Http\Controllers;

use ArielMejiaDev\LarapexCharts\Facades\LarapexChart;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Produk;
use Illuminate\Support\Facades\Auth;

class contohController extends Controller
{
    public function TampilContoh()
    {
        $isAdmin = Auth::user()->role == 'admin';

        // Query untuk mendapatkan data produk per hari
        $produkPerHariQuery = Produk::selectRaw('DATE(created_at) as date, COUNT(*) as total')
            ->groupBy('date')
            ->orderBy('date', 'asc');

        if (!$isAdmin) {
            $produkPerHariQuery->where('user_id', Auth::id());
        }

        $produkPerhari = $produkPerHariQuery->get();

        // Inisialisasi array untuk chart
        $dates = [];
        $totals = [];

        foreach ($produkPerhari as $item) {
            $dates[] = Carbon::parse($item->date)->format('Y-m-d');
            $totals[] = $item->total;
        }
        
        // Membuat chart
        $chart = LarapexChart::barChart()
            ->setTitle('Produk Ditambahkan Per Hari')
            ->setSubtitle('Data Penambahan Produk Harian')
            ->addData('Jumlah Produk', $totals)
            ->setXAxis($dates);

        // Mendapatkan total produk dan total revenue
        $totalProducts = Produk::count();
        $totalRevenue = Produk::sum('harga'); 

        // Data yang dikirimkan ke view
        $data = [
            'totalProducts' => $totalProducts,
            'salesToday' => 130,
            'totalRevenue' => $totalRevenue,
            'registeredUsers' => 350,
            'chart' => $chart
        ];
        

        return view('percobaan1', $data);
    }
}
