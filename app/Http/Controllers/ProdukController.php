<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
        $validatedData = $request->validate([
            'kode_produk' => 'required',
            'nama_produk' => 'required',
            'harga' => 'required|integer',
            'deskripsi' => 'nullable',
            'foto_produk' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('foto_produk')) {
            $imageName = time() . '.' . $request->foto_produk->extension();
            $request->foto_produk->move(public_path('images'), $imageName);
            $validatedData['foto_produk'] = $imageName; // Simpan nama file ke database
        }

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
            'foto_produk' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Validasi gambar
        ]);

        $produk = Produk::findOrFail($id);
        
        // Mengupdate data produk
        $produk->kode_produk = $request->kode_produk;
        $produk->nama_produk = $request->nama_produk;
        $produk->harga = $request->harga;
        $produk->deskripsi = $request->deskripsi;

        // Jika ada foto baru, hapus foto lama dan simpan yang baru
        if ($request->hasFile('foto_produk')) {
            // Hapus foto lama jika ada
            if ($produk->foto_produk) {
                Storage::disk('public')->delete('images/' . $produk->foto_produk);
            }

            // Simpan foto baru
            $file = $request->file('foto_produk');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('images', $filename, 'public');
            $produk->foto_produk = $filename;
        }

        $produk->save();

        return redirect()->route('produk.index')->with('success', 'Produk berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $produk = Produk::findOrFail($id);
        // Hapus foto produk jika ada
        if ($produk->foto_produk) {
            Storage::disk('public')->delete('images/' . $produk->foto_produk);
        }
        $produk->delete();
        return redirect()->route('produk.index')->with('success', 'Produk berhasil dihapus.');
    }
}
