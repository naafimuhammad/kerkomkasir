<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Struk Pembelian</title>
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            margin: 40px;
            color: #333;
        }
        h1, h2, h3 {
            text-align: center;
            margin-bottom: 5px;
        }
        p, .store-address {
            text-align: center;
            font-size: 14px;
            margin-top: 0;
            margin-bottom: 15px;
            color: #555;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 25px;
            font-size: 14px;
        }
        th {
            background-color: #f0ad4e;
            color: white;
            padding: 12px;
        }
        td {
            padding: 10px;
            border: 1px solid #ccc;
        }
        tfoot td {
            font-weight: bold;
            font-size: 15px;
        }
        .text-right {
            text-align: right;
        }
        .text-center {
            text-align: center;
        }
    </style>
</head>
<body>

    
    <h1>Toko Joko Jaya</h1>
    <p class="store-address">Jl. Soekarno Hatta, Malang, Jawa Timur, Indonesia</p>

    <h2>Nota Pembelian</h2>
    <p>Tanggal Pembelian: {{ $pesanan->created_at->timezone('Asia/Jakarta')->format('d M Y, H:i') }} WIB</p>

    <table>
        <thead>
            <tr>
                <th>Nama Barang</th>
                <th class="text-center">Jumlah</th>
                <th class="text-right">Harga Asli</th>
                <th class="text-center">Diskon</th>
                <th class="text-right">Harga Setelah Diskon</th>
                <th class="text-right">Subtotal</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pesanan->detailPesanan as $detail)
                @php
                    $hargaAsli = $detail->barang->harga;
                    $diskon = $detail->barang->diskon ?? 0;
                    $hargaDiskon = $hargaAsli - ($hargaAsli * $diskon / 100);
                    $subtotal = $hargaDiskon * $detail->jumlah;
                @endphp
                <tr>
                    <td>{{ $detail->barang->nama_barang }}</td>
                    <td class="text-center">{{ $detail->jumlah }}</td>
                    <td class="text-right">Rp {{ number_format($hargaAsli, 0, ',', '.') }}</td>
                    <td class="text-center">{{ $diskon }}%</td>
                    <td class="text-right">Rp {{ number_format($hargaDiskon, 0, ',', '.') }}</td>
                    <td class="text-right">Rp {{ number_format($subtotal, 0, ',', '.') }}</td>
                </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <td colspan="5" class="text-right">Total Pembayaran:</td>
                <td class="text-right">Rp {{ number_format($pesanan->total, 0, ',', '.') }}</td>
            </tr>
        </tfoot>
    </table>

</body>
</html>
