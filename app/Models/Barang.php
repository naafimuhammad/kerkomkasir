<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;

    protected $fillable = ['nama_barang', 'harga', 'diskon','stok'];

    // Relasi dengan DetailPesanan
    public function detailPesanan()
    {
        return $this->hasMany(DetailPesanan::class, 'barang_id');
    }
}
