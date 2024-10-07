<?php
namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    public function index()
    {
        $produk = Produk::all(); // Ambil semua produk
        return view('produk', compact('produk')); // Tampilkan view produk dengan data produk
    }

    public function create()
    {
        return view('create'); // Tampilkan form untuk membuat produk baru
    }

    public function store(Request $request)
{
    // Validasi dan simpan produk baru
    $validatedData = $request->validate([
        'kode_produk' => 'required', // Pastikan kode_produk juga divalidasi
        'nama_produk' => 'required',
        'harga' => 'required|integer',
        'deskripsi' => 'nullable',
    ]);

    Produk::create($validatedData);
    return redirect()->route('produk.index')->with('success', 'Produk berhasil ditambahkan.');
}


    public function edit($id)
    {
        $produk = Produk::findOrFail($id); // Temukan produk berdasarkan ID
        return view('edit', compact('produk')); // Tampilkan form untuk mengedit produk
    }

    public function update(Request $request, $id)
{
    $validatedData = $request->validate([
        'kode_produk' => 'required|string',
        'nama_produk' => 'required|string',
        'harga' => 'required|numeric',
        'deskripsi' => 'nullable|string',
        'jumlah_produk' => 'required|integer',
    ]);

    $produk = Produk::findOrFail($id);
    $produk->update($validatedData);

    return redirect()->route('produk.index')->with('success', 'Produk berhasil diperbarui.');
}

    public function destroy($id)
    {
        $produk = Produk::findOrFail($id);
        $produk->delete();
        return redirect()->route('produk.index')->with('success', 'Produk berhasil dihapus.');
    }
}
