@extends('layouts.app')

@section('content')
<div class="container" style="max-width: 600px; margin: auto; background-color: #f3e9dc; padding: 150px; border-radius: 15px; font-family: Arial, sans-serif; color: #333;">
    <h1 style="color: #6b4f4f; font-size: 70px; text-align: center;">Tambah Barang</h1>

    @if($errors->any())
        <div style="color: red; font-size: 20px; margin-bottom: 40px;">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('barang.store') }}" method="POST">
        @csrf

        <label style="font-size: 20px;">Nama Barang:</label>
        <input type="text" name="nama_barang" value="{{ old('nama_barang') }}" style="width: 100%; font-size: 18px; padding: 10px; margin-bottom: 20px;">
        <br>

        <label style="font-size: 20px;">Harga:</label>
        <input type="number" name="harga" value="{{ old('harga') }}" style="width: 100%; font-size: 18px; padding: 10px; margin-bottom: 20px;">
        <br>

        <label style="font-size: 20px;">Stok:</label>
        <input type="number" name="stok" value="{{ old('stok') }}" style="width: 100%; font-size: 18px; padding: 10px; margin-bottom: 20px;">
        <br>

        <label style="font-size: 20px;">Diskon:</label>
        <input type="number" name="diskon" value="{{ old('diskon') }}" style="width: 100%; font-size: 18px; padding: 10px; margin-bottom: 30px;">
        <br>

        <button type="submit" style="background-color: #6b4f4f; color: white; font-size: 18px; padding: 12px 24px; border: none; border-radius: 8px;">Simpan</button>
    </form>

    <br><br>
    <a href="{{ route('barang.index') }}" style="display: inline-block; background-color: #6b4f4f; color: white; padding: 12px 24px; font-size: 18px; border-radius: 8px; text-decoration: none;">
        ← Kembali
    </a>
</div>
@endsection
