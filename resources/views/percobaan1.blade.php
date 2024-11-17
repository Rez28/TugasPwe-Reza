<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard Penjualan</title>
    <link rel="stylesheet" href="{{ asset('/css/styles.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
    <div class="wrapper">

        <div class="sidebar">
            <h2>Dashboard Penjualan</h2>
        <ul>
            @auth
            @if(Auth::user()->role == 'admin')
                <li><a href="{{ route('admin.percobaan1') }}">Home</a></li>
            @elseif(Auth::user()->role == 'user')
                <li><a href="{{ route('user.percobaan1') }}">Home</a></li>
            @endif
        @endauth
        @auth
            @if(Auth::user()->role == 'admin')
                <li><a href="{{ route('produk.index.admin') }}">Produk</a></li>
            @elseif(Auth::user()->role == 'user')
            <li><a href="{{ route('produk.index.user') }}">Produk</a></li>
            @endif
        @endauth
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
    </div>
    <div class="main-content">
        <div class="cards">
            <div class="card">
                <h3>Total Produk</h3>
                <p>Total Produk: {{ $totalProducts }}</p>
            </div>
            <div class="card">
                <h3>Penjualan Hari Ini</h3>
                <p id="sales-today">{{ $salesToday }}</p>
            </div>
            <div class="card">
                <h3>Total Pendapatan</h3>
                <p id="total-revenue">{{ $totalRevenue }}</p>
            </div>
            <div class="card">
                <h3>Pengguna Terdaftar</h3>
                <p id="registered-users">{{ $registeredUsers }}</p>
            </div>
        </div>
        <div class="alert alert-primary" role="alert">
            A simple primary alert - check it out!
        </div>
        <div id="chart">
            <h2>Grafik Penjualan Harian</h2>
            {!! $chart->container() !!}
        </div>
    </div>

    <script src="{{ $chart->cdn() }}"></script>
    {{ $chart->script() }}
</body>
</html>
