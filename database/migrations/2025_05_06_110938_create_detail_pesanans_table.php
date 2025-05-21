<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePesananBarangTable extends Migration
{
    public function up()
    {
        Schema::create('detail_pesanans', function (Blueprint $table) {
            $table->id();
            // Definisikan kolom pesanan_id sebagai foreign key yang mengacu ke tabel pesanans
            $table->foreignId('pesanan_id')->constrained('pesanans')->onDelete('cascade');
            // Definisikan kolom barang_id sebagai foreign key yang mengacu ke tabel barangs
            $table->foreignId('barang_id')->constrained('barangs')->onDelete('cascade');
            $table->integer('jumlah');
            $table->integer('subtotal');
            $table->timestamps();
        });
    }

    public function down()
    {
        // Jika rollback, hapus tabel pesanan_barang
        Schema::dropIfExists('detail_pesanans');
    }
}
