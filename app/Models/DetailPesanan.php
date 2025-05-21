<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailPesanan extends Model
{
    use HasFactory;

    protected $fillable = ['pesanan_id', 'barang_id', 'jumlah', 'subtotal'];

    // Relasi dengan Pesanan
    public function pesanan()
    {
        return $this->belongsTo(Pesanan::class, 'pesanan_id');
    }

    // Relasi dengan Barang
    public function barang()
    {
        return $this->belongsTo(Barang::class, 'barang_id');
    }

    // Hapus relasi produk() dan fungsi riwayat() yang salah dari sini
}
