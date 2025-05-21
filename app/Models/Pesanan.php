<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'status', 'total'];

    // Relasi dengan DetailPesanan
    public function detailPesanan()
    {
        return $this->hasMany(DetailPesanan::class, 'pesanan_id');
    }

    // Relasi dengan User
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    // app/Models/Pesanan.php
public function details()
{
    return $this->hasMany(DetailPesanan::class);  // atau nama model detail yang sesuai
}

}
