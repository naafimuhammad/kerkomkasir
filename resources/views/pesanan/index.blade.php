

@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1 class="text-center mb-4" style="font-size: 36px; color: #6b4f4f;">Daftar Pesanan</h1>

    <table class="table table-striped table-bordered">
        <thead style="background-color: #6b4f4f; color: white;">
            <tr>
                <th>ID</th>
                <th>Tanggal</th>
                <th>Total</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pesanans as $pesanan)
            <tr>
                <td>{{ $pesanan->id }}</td>
                <td>{{ \Carbon\Carbon::parse($pesanan->tanggal)->format('d M Y') }}</td>
                <td>Rp {{ number_format($pesanan->total, 0, ',', '.') }}</td>
                <td>
                    <a href="{{ route('pesanan.show', $pesanan->id) }}" class="btn btn-info btn-sm">Lihat Detail</a>
                    <a href="{{ route('pesanan.edit', $pesanan->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('pesanan.destroy', $pesanan->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus pesanan ini?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
