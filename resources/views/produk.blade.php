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
            <div class="product-grid">
                <div class="main-content">
                    <h1>Daftar Produk</h1>
                    <h5>Temukan Produk terbaik untuk kebutuhan anda</h5>
                    
                    <a href="{{ route('produk.create') }}" class="btn btn-primary mb-3">Tambah Produk</a>

                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    <div class="container">
                        <div class="row" style="mx-3">
                            <div class="product-grid">
                                @foreach ($produk as $item)
                                <div class="product-card">
                                    <img src="https://via.placeholder.com/200" alt="{{ $item->nama_produk }}">
                                    <h3>{{ $item->nama_produk }}</h3>
                                    <p class="price">{{ $item->harga }}</p>
                                    <p class="description">{{ $item->deskripsi }}</p>
                                    <a href="{{ route('produk.edit', $item->id) }}" class="btn btn-warning">Edit</a>
                                    <form action="{{ route('produk.destroy', $item->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </div>
                                @endforeach
                            </div>
                    </div>
                </div>
                </div>
                

            </div>
        </div>
    </div>
    <footer>
        <p>&copy;2024 Aplikasi Penjualan. All rights reserved</p>
    </footer>
</body>

</html>