@extends('layouts.app')

@section('title', 'Riwayat Pesanan')

@section('content')
<style>
    /* Container utama */
    .container {
        font-family: 'Poppins', sans-serif;
        background-color: #fffaf3;
        padding: 30px;
        border-radius: 12px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        max-width: 1000px;
        margin: 30px auto;
    }

    /* Judul */
    h1 {
        color: #6b4f4f;
        font-size: 36px;
        margin-bottom: 30px;
        text-align: center;
    }

    /* Tabel */
    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
    }

    table thead {
        background-color: #d5bfa3;
        color: #333;
    }

    table th,
    table td {
        padding: 15px;
        border: 1px solid #ddd;
        text-align: center;
        vertical-align: middle;
    }

    table tbody tr:nth-child(even) {
        background-color: #f5f0eb;
    }

    table tbody tr:hover {
        background-color: #f0e5d8;
    }

    /* Link dan button */
    a,
    button {
        font-size: 14px;
        text-decoration: none;
        padding: 6px 12px;
        margin: 0 2px;
        border-radius: 5px;
        border: none;
        cursor: pointer;
    }

    a {
        background-color: #8d6e63;
        color: #fff;
        display: inline-block;
    }

    a:hover {
        background-color: #6d4c41;
    }

    button {
        background-color: #c62828;
        color: #fff;
    }

    button:hover {
        background-color: #b71c1c;
    }

    /* Pesan sukses */
    .success-msg {
        color: green;
        margin-bottom: 15px;
        font-weight: 600;
        text-align: center;
    }

    /* Tombol kembali */
    .btn-kembali {
        display: inline-block;
        background-color: #6b4f4f;
        color: #fff;
        padding: 10px 20px;
        border-radius: 8px;
        margin-top: 25px;
        text-align: center;
        text-decoration: none;
        font-weight: 600;
        transition: background-color 0.3s ease;
    }

    .btn-kembali:hover {
        background-color: #543a3a;
    }

    /* List produk dan harga di satu cell */
    .produk-list {
        text-align: left;
    }

    /* Reset dan spacing untuk list di tabel */
    table tbody td ul {
        list-style-type: none;
        padding-left: 0;
        margin: 5px 0;
        text-align: center;
    }

    table tbody td ul li {
        margin-bottom: 6px;
    }

    /* Untuk list produk agar rata kiri */
    .produk-list ul {
        text-align: left;
    }
</style>

<div class="container">
    <h1>Riwayat Pesanan</h1>

    @if(session('success'))
        <div class="success-msg">
            {{ session('success') }}
        </div>
    @endif

    @if($pesanans->isEmpty())
        <p style="text-align: center;">Belum ada riwayat pesanan.</p>
    @else
        <table>
            <thead>
                <tr>
                    <th>ID Pesanan</th>
                    <th>Produk</th>
                    <th>Harga Asli</th>
                    <th>Diskon</th>
                    <th>Harga Setelah Diskon</th>
                    <th>Tanggal Pesan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pesanans as $pesanan)
                    <tr>
                        <td>{{ $pesanan->id }}</td>
                        <td class="produk-list">
                            <ul>
                                @foreach($pesanan->detailPesanan as $detail)
                                    <li>{{ $detail->barang->nama_barang }} x{{ $detail->jumlah }}</li>
                                @endforeach
                            </ul>
                        </td>
                        <td>
                            <ul>
                                @foreach($pesanan->detailPesanan as $detail)
                                    <li>Rp{{ number_format($detail->barang->harga, 0, ',', '.') }}</li>
                                @endforeach
                            </ul>
                        </td>
                        <td>
                            <ul>
                                @foreach($pesanan->detailPesanan as $detail)
                                    <li>{{ $detail->barang->diskon }}%</li>
                                @endforeach
                            </ul>
                        </td>
                        <td>
                            <ul>
                                @foreach($pesanan->detailPesanan as $detail)
                                    @php
                                        $hargaDiskon = $detail->barang->harga - ($detail->barang->harga * $detail->barang->diskon / 100);
                                    @endphp
                                    <li>Rp{{ number_format($hargaDiskon, 0, ',', '.') }}</li>
                                @endforeach
                            </ul>
                        </td>
                        <td>{{ $pesanan->created_at->format('d-m-Y H:i') }}</td>
                        <td>
                            <a href="{{ route('pesanan.show', $pesanan->id) }}">Lihat</a>
                            <a href="{{ route('pesanan.cetakStruk', $pesanan->id) }}">Cetak Struk</a>
                            <form action="{{ route('pesanan.destroy', $pesanan->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('Yakin ingin menghapus pesanan ini?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif

    <a href="{{ route('home') }}" class="btn-kembali">Kembali</a>
</div>
@endsection
