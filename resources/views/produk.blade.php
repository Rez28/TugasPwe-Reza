<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{asset('/css/style2.css')}}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
    <div class="wrapper">
        <div class="sidebar">
            <h2>Dashboard Penjualan</h2>
            <ul>
                <li><a href="{{ url('percobaan1') }}">Home</a></li>
                <li><a href="{{ url('produk') }}">Produk</a></li>
                <li><a href="{{ url('#') }}">Penjualan</a></li>
                <li><a href="{{ url('#') }}">Laporan</a></li>
                <li><a href="{{ url('#') }}">Pengaturan</a></li>
            </ul>
        </div>
        <div class="main-content">
            <h1>Daftar Produk</h1>
            <h5>Temukan Produk terbaik untuk kebutuhan anda</h5>
            <div class="product-grid">
                @foreach ($produk as $item)
                <div class="product-card">
                    <img src="https://via.placeholder.com.200" alt="produk 1">
                    <h3>{{ $item ->nama_produk }}</h3>
                    <p class="price">{{ $item->harga }}</p>
                    <p class="description">{{ $item->deskripsi }}</p>
                    <button class="card-button">Edit</button>
                    <button class="card-button">Delete</button>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <footer>
        <p>&copy;2024 Aplikasi Penjualan. All rights reserved</p>
    </footer>
</body>

</html>