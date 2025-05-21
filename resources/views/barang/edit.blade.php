@extends('layouts.app')

@section('content')
<div class="container" style="max-width: 600px; margin: auto; background-color: #f3e9dc; padding: 100px; border-radius: 15px; font-family: Arial, sans-serif; color: #333;">
    <h2 style="color: #6b4f4f; font-size: 50px; text-align: center;">Edit Barang</h2>

    <form action="{{ route('barang.update', $barang->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div style="margin-bottom: 20px;">
            <label style="font-size: 20px;">Nama Barang</label>
            <input type="text" name="nama_barang" value="{{ $barang->nama_barang }}" style="width: 100%; font-size: 18px; padding: 10px;">
        </div>

        <div style="margin-bottom: 20px;">
            <label style="font-size: 20px;">Harga</label>
            <input type="number" name="harga" value="{{ $barang->harga }}" style="width: 100%; font-size: 18px; padding: 10px;">
        </div>

        <div style="margin-bottom: 20px;">
            <label style="font-size: 20px;">Diskon</label>
            <input type="number" name="diskon" value="{{ $barang->diskon }}" style="width: 100%; font-size: 18px; padding: 10px;">
        </div>

        <div style="margin-bottom: 30px;">
            <label style="font-size: 20px;">Stok</label>
            <input type="number" name="stok" value="{{ $barang->stok }}" style="width: 100%; font-size: 18px; padding: 10px;">
        </div>

        <button type="submit" style="background-color: #6b4f4f; color: white; font-size: 18px; padding: 12px 24px; border: none; border-radius: 8px;">Simpan</button>
    </form>

    <br><br>
    <a href="{{ route('barang.index') }}" style="display: inline-block; background-color: #6b4f4f; color: white; padding: 12px 24px; font-size: 18px; border-radius: 8px; text-decoration: none;">
        ← Kembali 
    </a>
</div>
@endsection
