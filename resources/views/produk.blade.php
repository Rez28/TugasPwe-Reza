<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Produk</title>
    <link rel="stylesheet" href="{{ asset('/css/style2.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
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
            <h1>Daftar Produk</h1>
            <h5>Temukan produk terbaik untuk kebutuhan Anda!</h5>
            <a href="{{ Auth::user()->role === 'admin' ? route('produk.create.admin') : route('produk.create.user') }}" 
                class="btn btn-primary mb-3">Tambah Produk</a>          

            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <div class="product-grid">
                @forelse ($produk as $item)
                    <div class="product-card">
                        <img src="{{ $item->image ? asset('image/' . $item->image) : 'https://via.placeholder.com/200x200' }}" alt="{{ $item->nama_produk }}" class="img-fluid">
                        <h3>{{ $item->nama_produk }}</h3>
                        <p class="price">Rp {{ number_format($item->harga, 0, ',', '.') }}</p>
                        <p class="description">{{ $item->deskripsi }}</p>

                        
                        @auth
                            @if(Auth::user()->role == 'admin')
                                <a href="{{ route('produk.edit.admin', $item->id) }}" class="btn btn-warning mb-2">Edit</a>
                                <form action="{{ route('produk.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus produk ini?');" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            @elseif(Auth::user()->role == 'user')
                                <a href="{{ route('produk.edit.user', $item->id) }}" class="btn btn-warning mb-2">Edit</a>
                            @endif
                        @endauth
                    </div>
                @empty
                    <p class="text-center">Tidak ada produk yang tersedia saat ini.</p>
                @endforelse
            </div>
        </div>
    </div>
</body>
</html>
