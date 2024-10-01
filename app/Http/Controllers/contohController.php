<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class contohController extends Controller
{
    public function TampilContoh()
    {
        $data = [
            'totalProducts' => 310,
            'salesToday' => 100,
            'totalReveneu' => 'Rp 75,000,000',
            'registerdUsera' => 350,
        ];
        return view('percobaan1',$data);
    }
}
