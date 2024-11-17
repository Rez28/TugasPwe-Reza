<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Produk extends Model
{
    use HasFactory;

    protected $fillable = [
        'kode_produk',
        'nama_produk',
        'harga',
        'deskripsi',
        'foto_produk',
        'user_id',
    ];

    // Relasi dengan User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Mengubah harga menjadi tipe float
    protected $casts = [
        'harga' => 'float',
    ];

    // Format harga sebagai string dengan format mata uang
    public function getFormattedHargaAttribute()
    {
        return number_format($this->harga, 0, ',', '.'); // Format harga ke format Indonesia
    }

    // Menyimpan foto produk dengan nama file yang unik
    public function setFotoProdukAttribute($value)
    {
        if (is_file($value)) {
            $this->attributes['foto_produk'] = $value->store('produk_images', 'public'); // Menyimpan foto di folder produk_images
        }
    }
}
