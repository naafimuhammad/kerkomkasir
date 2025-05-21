@extends('layouts.app')

@section('content')
<div class="container" style="max-width: 1100px; margin: auto; background-color: #f3e9dc; padding: 60px; border-radius: 20px; font-family: Arial, sans-serif; color: #333;">
    <h1 style="color: #6b4f4f; font-size: 56px; text-align: center; margin-bottom: 30px;">Daftar Barang</h1>

    @if (session('success'))
        <p style="color: green; font-size: 20px; text-align: center; margin-top: 20px;">{{ session('success') }}</p>
    @endif

    <div style="text-align: center; margin: 40px 0;">
        <a href="{{ url('/') }}" style="display: inline-block; margin: 12px; background-color: #6b4f4f; padding: 16px 32px; color: white; text-decoration: none; border-radius: 12px; font-size: 20px;">
            ← Kembali
        </a>

        <a href="{{ route('barang.create') }}" style="display: inline-block; margin: 12px; background-color: #6b4f4f; padding: 16px 32px; color: white; text-decoration: none; border-radius: 12px; font-size: 20px;">
            + Tambah Barang
        </a>
    </div>

    <table style="width: 100%; margin-top: 30px; border-collapse: collapse; font-size: 20px; box-shadow: 0 0 12px rgba(0,0,0,0.15); border-radius: 12px; overflow: hidden;">
        <thead style="background-color: #6b4f4f; color: white;">
            <tr>
                <th style="padding: 20px;">Nama</th>
                <th style="padding: 20px;">Harga</th>
                <th style="padding: 20px;">Diskon</th>
                <th style="padding: 20px;">Stok</th>
                <th style="padding: 20px;">Harga Diskon</th>
                <th style="padding: 20px;">Aksi</th>
            </tr>
        </thead>
        <tbody style="background-color: #fff8f0;">
            @foreach ($barangs as $barang)
                <tr style="border-bottom: 1px solid #ccc;">
                    <td style="padding: 20px;">{{ $barang->nama_barang }}</td>
                    <td style="padding: 20px;">Rp{{ number_format($barang->harga, 0, ',', '.') }}</td>
                    <td style="padding: 20px;">{{ $barang->diskon }}%</td>
                    <td style="padding: 20px;">{{ $barang->stok }}</td>
                    <td style="padding: 20px;">
                        Rp{{ number_format($barang->harga - ($barang->harga * $barang->diskon / 100), 0, ',', '.') }}
                    </td>
                    <td style="padding: 20px;">
                        <a href="{{ route('barang.edit', $barang->id) }}" style="color: #4a7c59; text-decoration: none; font-weight: bold; margin-right: 15px; font-size: 18px;">Edit</a>
                        <form action="{{ route('barang.destroy', $barang->id) }}" method="POST" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Yakin hapus barang ini?')" style="background-color: #cc4444; color: white; border: none; padding: 8px 14px; border-radius: 6px; font-size: 18px;">
                                Hapus
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
