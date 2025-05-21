@extends('layouts.app')

@section('content')
<div class="container" style="background-color: #f3e9dc; padding: 50px; border-radius: 12px; font-family: Arial, sans-serif; color: #333; max-width: 1100px; margin: auto;">
    <h2 style="text-align: center; font-size: 48px; color: #6b4f4f; margin-bottom: 40px; font-weight: 700;">
        Buat Pesanan Baru
    </h2>

    <form action="{{ route('pesanan.store') }}" method="POST">
        @csrf

        @if ($errors->any())
        <div style="background-color: #f8d7da; padding: 15px; margin-bottom: 30px; border-radius: 6px; font-size: 18px;">
            <ul style="list-style: none; padding-left: 0;">
                @foreach ($errors->all() as $error)
                    <li style="color: #721c24;">{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <table style="width: 100%; border-collapse: collapse; font-size: 22px;">
            <thead style="background-color: #6b4f4f; color: white;">
                <tr>
                    <th style="padding: 18px;">Nama Barang</th>
                    <th style="padding: 18px;">Harga</th>
                    <th style="padding: 18px;">Diskon (%)</th>
                    <th style="padding: 18px;">Stok</th>
                    <th style="padding: 18px;">Harga Diskon</th>
                    <th style="padding: 18px;">Jumlah</th>
                </tr>
            </thead>
            <tbody style="background-color: #fff3e6;">
                @foreach ($barangs as $barang)
                <tr>
                    <td style="padding: 18px;">{{ $barang->nama_barang }}</td>
                    <td style="padding: 18px;">Rp{{ number_format($barang->harga, 0, ',', '.') }}</td>
                    <td style="padding: 18px;">{{ $barang->diskon }}%</td>
                    <td style="padding: 18px;">{{ $barang->stok }}</td>
                    <td style="padding: 18px;">
                        Rp{{ number_format($barang->harga - ($barang->harga * $barang->diskon / 100), 0, ',', '.') }}
                    </td>
                    <td style="padding: 18px;">
                        <input type="number" name="barang[{{ $barang->id }}][jumlah]" 
                            value="{{ old('barang.' . $barang->id . '.jumlah', 0) }}" 
                            min="0"
                            style="width: 110px; padding: 12px; font-size: 20px; border-radius: 8px; border: 1px solid #ccc;">
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <div style="text-align: center; margin-top: 40px;">
            <button type="submit" style="background-color: #6b4f4f; color: white; padding: 18px 40px; font-size: 24px; font-weight: 700; border: none; border-radius: 10px; cursor: pointer;">
               Beli
            </button>
        </div>
    </form>

    <div style="text-align: center; margin-top: 30px;">
        <a href="{{ route('home') }}" style="background-color: #6b4f4f; color: white; padding: 18px 40px; font-size: 22px; font-weight: 700; text-decoration: none; border-radius: 10px; display: inline-block; cursor: pointer;">
            Kembali
        </a>
    </div>
</div>
@endsection
