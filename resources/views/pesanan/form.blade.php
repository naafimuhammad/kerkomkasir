@extends('layouts.app')

@section('content')
    <div class="card">
        <h2>Form Pemesanan</h2>
        <form action="{{ route('pesanan.store') }}" method="POST">
            @csrf
            @foreach ($barang as $b)
                <div>
                    <label>
                        <input type="checkbox" name="barang[{{ $b->id }}][id]" value="{{ $b->id }}">
                        {{ $b->nama }} (Stok: {{ $b->stok }}, Harga: Rp{{ number_format($b->harga) }})
                    </label>
                    <input type="number" name="barang[{{ $b->id }}][jumlah]" min="1" placeholder="Jumlah">
                </div>
            @endforeach
            <br>
            <button type="submit" class="btn">Simpan Pesanan</button>
        </form>
    </div>
@endsection
