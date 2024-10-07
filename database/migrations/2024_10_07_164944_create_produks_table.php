<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProduksTable extends Migration
{
    public function up()
    {
        Schema::create('produks', function (Blueprint $table) {
            $table->id();
            $table->string('kode_produk')->unique(); // Menambahkan kolom kode_produk
            $table->string('nama_produk');
            $table->text('deskripsi')->nullable(); // Tambahkan nullable jika deskripsi tidak wajib
            $table->decimal('harga', 10, 2);
            $table->integer('jumlah_produk')->default(0); // Menambahkan kolom jumlah_produk dengan default 0
            $table->string('image')->nullable(); // Menambahkan kolom image
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('produks'); // Hapus tabel jika rollback
    }
}
