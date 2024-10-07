<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Produk</title>
</head>
<body>
    <h1>Edit Produk</h1>
    <form action="{{ route('produk.update', $produk->id) }}" method="POST">
        @csrf
        @method('PUT') <!-- Menambahkan metode PUT untuk update -->
        <div class="mb-3">
            <label for="kode_produk" class="form-label">Kode Produk</label>
            <input type="text" name="kode_produk" class="form-control" value="{{ old('kode_produk', $produk->kode_produk) }}" required>
        </div>
        <div class="mb-3">
            <label for="nama_produk" class="form-label">Nama Produk</label>
            <input type="text" name="nama_produk" class="form-control" value="{{ old('nama_produk', $produk->nama_produk) }}" required>
        </div>
        <div class="mb-3">
            <label for="harga" class="form-label">Harga</label>
            <input type="number" name="harga" class="form-control" value="{{ old('harga', $produk->harga) }}" required>
        </div>
        <div class="mb-3">
            <label for="jumlah_produk" class="form-label">Jumlah Produk</label>
            <input type="number" name="jumlah_produk" class="form-control" value="{{ old('jumlah_produk', $produk->jumlah_produk) }}" required>
        </div>
        <div class="mb-3">
            <label for="deskripsi" class="form-label">Deskripsi</label>
            <textarea name="deskripsi" class="form-control">{{ old('deskripsi', $produk->deskripsi) }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>

    <a href="{{ route('produk.index') }}">Kembali</a>
</body>
</html>
