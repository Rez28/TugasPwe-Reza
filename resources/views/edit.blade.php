<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Produk</title>
    <link rel="stylesheet" href="{{ asset('/css/style2.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
    <h1>Edit Produk</h1>
    <form action="{{ route('produk.update', $produk->id) }}" method="POST" enctype="multipart/form-data">
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
        <div class="mb-3">
            <label for="foto_produk" class="form-label">Foto Produk</label>
            <input type="file" name="foto_produk" class="form-control">
            <small>Biarkan kosong jika tidak ingin mengubah foto.</small>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>

    <a href="{{ route('produk.index') }}">Kembali</a>
</body>
</html>
