<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('produks', function (Blueprint $table) {
            $table->id(); // Membuat kolom 'id' dengan tipe big integer (primary key dan auto increment).
            $table->string('kode_produk'); // Membuat kolom 'kode_produk' dengan tipe string (varchar).
            $table->string('nama_produk'); // Membuat kolom 'nama_produk' dengan tipe string (varchar).
            $table->integer('harga'); // Membuat kolom 'harga' dengan tipe integer (bilangan bulat).
            $table->text('deskripsi')->nullable(); // Membuat kolom 'deskripsi' dengan tipe text dan membolehkan nilai null.
            $table->string('foto_produk')->nullable(); // Membuat kolom 'foto_produk' dengan tipe string dan membolehkan nilai null.
            $table->timestamps(); // Membuat dua kolom 'created_at' dan 'updated_at' secara otomatis.
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produk');
    }
};
