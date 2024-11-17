<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class ProdukController extends Controller
{
    public function index()
    {
        // Menampilkan produk berdasarkan role
        $produk = Auth::user()->role == 'admin'
            ? Produk::all() // Jika user adalah admin, tampilkan semua produk
            : Produk::where('user_id', Auth::user()->id)->get(); // Jika user biasa, tampilkan produk yang sesuai dengan user_id
        // Mengirim variabel produk ke view
        return view('produk', compact('produk'));
    }

    public function create()
    {
        return view('create');  // Ganti dengan view form produk
    }

    public function TampilContoh()
    {
        return view('percobaan1');
    }

    

    public function store(Request $request)
{
    // Validasi input
    $validatedData = $request->validate([
        'kode_produk' => 'required|unique:produks,kode_produk',
        'nama_produk' => 'required',
        'harga' => 'required|integer',
        'deskripsi' => 'required',
        'jumlah_produk' => 'required|integer', 
        'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
    ]);

    // Jika ada file gambar yang diupload
    if ($request->hasFile('foto_produk')) {
        $imageName = time() . '.' . $request->foto_produk->extension();
        $request->foto_produk->move(public_path('image'), $imageName);
    } else {
        // Tetapkan nilai default jika gambar tidak diunggah
        $imageName = 'https://via.placeholder.com/200'; // Sesuaikan dengan nama file default Anda
    }

    // Simpan data ke database (menggunakan kolom images)
    $produk = new Produk();
    $produk->kode_produk = $request->kode_produk;
    $produk->nama_produk = $request->nama_produk;
    $produk->harga = $request->harga;
    $produk->deskripsi = $request->deskripsi;
    $produk->jumlah_produk = $request->jumlah_produk;
    $produk->image = $imageName; // Gantilah foto_produk dengan images
    $produk->user_id = Auth::user()->id; // Menyimpan user_id pengguna yang sedang login
    
    
    
    // Cek jika kode_produk sudah ada
    $existingProduk = Produk::where('kode_produk', $validatedData['kode_produk'])->first();
    if ($existingProduk) {
        return redirect()->back()->with('error', 'Kode produk sudah ada. Silakan gunakan kode yang berbeda.');
    }
    $produk->save();

    // Simpan data ke database
    // Produk::create([
    //     'kode_produk' => $validatedData['kode_produk'],
    //     'nama_produk' => $validatedData['nama_produk'],
    //     'harga' => $validatedData['harga'],
    //     'jumlah_produk' => $validatedData['jumlah_produk'], 
    //     'deskripsi' => $validatedData['deskripsi'],
    //     'image' => $validatedData['image'],
    //     'user_id' => Auth::user()->id, // Menghubungkan produk dengan user
    // ]);

    // Redirect kembali ke halaman sebelumnya dengan pesan sukses
    return redirect()->route('produk.index.admin')->with('success', 'Produk berhasil ditambahkan');
}


    public function edit($id)
    {
        $produk = Produk::findOrFail($id);
        return view('edit', compact('produk'));  // Sesuaikan dengan view edit produk
    }

    public function update(Request $request, $id)
{
    $produk = Produk::findOrFail($id);

    $validatedData = $request->validate([
        'kode_produk' => 'required',
        'nama_produk' => 'required',
        'harga' => 'required|integer',
        'jumlah_produk' => 'required|integer',
        'deskripsi' => 'required',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
    ]);

    // Update foto produk jika ada file baru
    if ($request->hasFile('foto_produk')) {
        // Hapus gambar lama jika ada
        if ($produk->foto_produk && file_exists(public_path('image/'.$produk->foto_produk))) {
            unlink(public_path('image/'.$produk->foto_produk));
        }

        // Simpan gambar baru
        $imageName = time() . '.' . $request->foto_produk->extension();
        $request->foto_produk->move(public_path('image'), $imageName);
        $produk->foto_produk = $imageName;
    }

    // Update data produk lainnya
    $produk->kode_produk = $validatedData['kode_produk'];
    $produk->nama_produk = $validatedData['nama_produk'];
    $produk->harga = $validatedData['harga'];
    $produk->jumlah_produk = $validatedData['jumlah_produk'];
    $produk->deskripsi = $validatedData['deskripsi'];
    $produk->image = $imageName;

    // Simpan perubahan produk
    $produk->save();

    return redirect()->route('produk.index.admin')->with('success', 'Produk berhasil diperbarui');
}



    public function destroy($id)
    {
        $produk = Produk::findOrFail($id);
        // Hapus foto produk jika ada
        if ($produk->foto_produk && file_exists(public_path('image/'.$produk->foto_produk))) {
            unlink(public_path('image/'.$produk->foto_produk));
        }
        $produk->delete();
        return redirect()->route('produk.index.admin')->with('success', 'Produk berhasil dihapus');
    }

    public function Viewlaporan()
    {
        $produk = Produk::all();
        return view('laporan', compact('produk'));
    }

    public function print()
    {
        $produk = Produk::all();
        $pdf = Pdf::loadView('report', compact('produk'));
        return $pdf->download('laporan_produk.pdf');
    }

}
