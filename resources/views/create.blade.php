<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Produk</title>
    <link rel="stylesheet" href="{{asset('/css/style2.css')}}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

</head>
<body>
    <h1>Tambah Produk</h1>
    <form action="{{ route('produk.store') }}" method="POST" enctype="multipart/form-data" class="p-4 shadow-sm rounded">
      @csrf
      <div class="mb-3">
          <label for="kode_produk" class="form-label">Kode Produk</label>
          <input type="text" class="form-control" id="kode_produk" name="kode_produk" placeholder="Enter product code" required>
      </div>
      <div class="mb-3">
          <label for="productName" class="form-label">Product Name</label>
          <input type="text" class="form-control" id="productName" name="nama_produk" placeholder="Enter product name" required>
      </div>
      <div class="mb-3">
          <label for="price" class="form-label">Price</label>
          <input type="number" class="form-control" id="price" name="harga" placeholder="Enter price" required>
      </div>
      <div class="mb-3">
          <label for="description" class="form-label">Description</label>
          <textarea class="form-control" id="description" name="deskripsi" rows="3" placeholder="Enter product description" required></textarea>
      </div>
      <div class="mb-3">
          <label for="productImage" class="form-label">Product Image</label>
          <input class="form-control" type="file" id="productImage" name="foto_produk" accept="image/*" required>
      </div>
      <button type="submit" class="btn btn-primary">Submit</button>
  </form>
  
      
    
    
    <a href="{{ route('produk.index') }}">Kembali</a>
</body>
</html>
