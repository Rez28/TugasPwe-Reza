<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('/css/style2.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
    <div class="wrapper">
        <div class="sidebar">
            <h2>Dashboard Penjualan</h2>
            <ul>
                <!-- Tampilkan link 'Home' berdasarkan role -->
                @auth
                @if(Auth::user()->role == 'admin')
                    <li><a href="{{ route('admin.percobaan1') }}">Home</a></li>
                @elseif(Auth::user()->role == 'user')
                    <li><a href="{{ route('user.percobaan1') }}">Home</a></li>
                @endif
            @endauth
            
            <!-- Tampilkan link 'Produk' berdasarkan role -->
            @auth
                @if(Auth::user()->role == 'admin')
                    <li><a href="{{ route('produk.index.admin') }}">Produk</a></li>
                @elseif(Auth::user()->role == 'user')
                    <li><a href="{{ route('produk.index.user') }}">Produk</a></li>
                @endif
            @endauth
    
            <!-- Tampilkan link 'Laporan' berdasarkan role -->
            @auth
                @if(Auth::user()->role == 'admin')
                    <li><a href="{{ route('laporan.index.admin') }}">Laporan</a></li>
                @elseif(Auth::user()->role == 'user')
                    <li><a href="{{ route('laporan.index.user') }}">Laporan</a></li>
                @endif
            @endauth
            <li>
                <form action="{{ url('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="text-decoration-none bg-transparent border-0 text-white" style="font-size: 18px;">Logout</button>
                </form>
            </li>
            </ul>
        </div>
        <div class="main-content">
            <header><h1>Selamat Datang Di Dashboard Laporan</h1></header>
        <div class="container mt-4">
            <table class="table table-bordered table-striped">
                <thead class="table-dark">
                    <tr>
                        <th>No</th>
                        <th>Nama Produk</th>
                        <th>Deskripsi</th>
                        <th>Harga</th>
                        <th>Jumlah Produk</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($produk as $key => $produk)
                    <tr>    
                        <td>{{ $key +1  }}</td>
                        <td>{{ $produk->nama_produk }}</td>
                        <td>{{ $produk->deskripsi }}</td>
                        <td>{{ number_format($produk->harga, 0, ',',',') }}</td>
                        <td>{{ $produk->jumlah_produk }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <a href="{{ Auth::user()->role === 'admin' ? route('laporan.print.admin') : route('laporan.print.user') }}" class="btn btn-secondary w-100 d-flex justify-content-center align-items-center text-white cursor-pointer">Export to PDF</a>
        </div>
        </div>
    </div>
    <footer>
        <p>&copy;2024 Aplikasi Penjualan. All rights reserved</p>
    </footer>
</body>
</html>
    