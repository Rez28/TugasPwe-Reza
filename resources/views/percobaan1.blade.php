<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Doashboard Penjualan</title>
    <link rel="stylesheet" href="{{asset('/css/styles.css')}}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
    <div class="sidebar">
        <h2>Dashboard Penjualan</h2>
        <ul>
            <li><a href="percobaan1">Home</a></li>
            <li><a href="produk">Produk</a></li>
            <li><a href="#">Penjualan</a></li>
            <li><a href="#">Laporan</a></li>
            <li><a href="#">Pengaturan</a></li>
        </ul>
    </div>
    <div class="main-content">
        <div class="cards">
            <div class="card">
                <h3>Total Produk</h3>
                <p id="total-produk">{{ $totalProducts }}</p>
            </div>
            <div class="card">
                <h3>Penjualan Hari Ini</h3>
                <p id="sales-today">{{ $salesToday }}</p>
            </div>
            <div class="card">
                <h3>Total Pendapatan</h3>
                <p id="total-revenue">{{ $totalReveneu }}</p>
            </div>
            <div class="card">
                <h3>Pengguna Terdaftar</h3>
                <p id="registered-users">350</p>
            </div>
        </div>
        <div class="alert alert-primary" role="alert">
            A simple primary alert-check it out
        </div>
        <div id="chart">
            <h2>Grafik Penjualan Bulanan</h2>
            <canvas id="salesChart"></canvas>
        </div>
    </div>
</body>
</html>
