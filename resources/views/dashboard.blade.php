<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Kasir</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&family=Poppins&display=swap');

        body {
            background-color: #f3e9dc;
            font-family: 'Poppins', sans-serif;
            color: #333;
            text-align: center;
            padding-top: 50px;
        }

        h1 {
            font-family: 'Playfair Display', serif;
            color: #6b4f4f;
            font-size: 5rem;
            margin-bottom: 10px;
            text-shadow: 2px 2px 5px rgba(0,0,0,0.1);
        }

        h2 {
            font-size: 2.5rem;
            color: #6b4f4f;
            font-weight: 600;
            margin-bottom: 40px;
            letter-spacing: 1px;
            text-shadow: 1px 1px 3px rgba(0,0,0,0.08);
        }

        .menu {
            margin-top: 20px;
        }

        .menu a {
            display: inline-block;
            background-color: #6b4f4f;
            color: #fff;
            text-decoration: none;
            padding: 20px 40px;
            margin: 15px;
            border-radius: 12px;
            font-size: 2.5rem;
            transition: background-color 0.3s ease, transform 0.2s;
        }

        .menu a:hover {
            background-color: #573b3b;
            transform: scale(1.05);
        }
    </style>
</head>
<body>
    <h1>Toko Joko Jaya</h1>
    <h2>Selamat Datang & Selamat Berbelanja!</h2>

    <div class="menu">
        <a href="{{ route('barang.index') }}">Stok Barang</a>
        <a href="{{ route('pesanan.create') }}">Pemesanan</a>
        <a href="{{ route('pesanan.riwayat') }}">Riwayat Pemesanan</a>
    </div>
</body>
</html>
