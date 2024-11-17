<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Produk</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table, th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        h2 {
            text-align: center;
        }
        .date {
            text-align: right;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="date">
        Tanggal: {{ now()->format('d-m-Y H:i') }}
    </div>
    <h2>Laporan Produk</h2>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Produk</th>
                <th>Deskripsi</th>
                <th>Harga</th>
                <th>Jumlah Produk</th>
            </tr>
        </thead>
        <tbody>
            @foreach($produk as $key => $produk)
            <tr>
                <td>{{ $key + 1 }}</td>
                <td>{{ $produk->nama_produk }}</td>
                <td>{{ $produk->deskripsi }}</td>
                <td>Rp{{ number_format($produk->harga, 0, ',', '.') }}</td>
                <td>{{ $produk->jumlah_produk }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
