@extends('layouts.app')

@section('content')
<div class="container py-5 d-flex flex-column align-items-center" 
     style="background-color: #fdfaf6; border-radius: 20px; max-width: 1000px; margin: auto;">
    
    <h1 class="mb-5 text-center" style="color: #6b4f4f; font-weight: 900; font-size: 5rem;">
        <i class="fas fa-receipt"></i> Nota Pembelian
    </h1>

    <p class="text-center text-muted mb-5" style="font-size: 1.8rem;">
        <i class="far fa-clock"></i> Dibeli pada: {{ $pesanan->created_at->timezone('Asia/Jakarta')->format('d M Y, H:i') }} WIB
    </p>

    @if($pesanan->detailPesanan->count() > 0)
        <div class="card shadow-lg w-100 mb-5" style="border-radius: 30px;">
            <div class="card-body px-6 py-6">
                <div class="table-responsive" style="overflow-x:auto;">
                    <table class="table table-striped table-hover mb-0" 
                           style="font-size: 1.8rem; min-width: 100%; border-collapse: separate; border-spacing: 0 12px;">
                        <thead class="bg-secondary text-white" style="border-radius: 20px;">
                            <tr>
                                <th style="width: 40%; text-align: left; white-space: normal; padding: 18px 15px;">
                                    Nama Barang
                                </th>
                                <th class="text-center" style="width: 12%; padding: 18px 15px;">
                                    Jumlah
                                </th>
                                <th class="text-right" style="width: 16%; padding: 18px 15px;">
                                    Harga Asli
                                </th>
                                <th class="text-center" style="width: 12%; padding: 18px 15px;">
                                    Diskon (%)
                                </th>
                                <th class="text-right" style="width: 20%; padding: 18px 15px;">
                                    Harga Setelah Diskon
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($pesanan->detailPesanan as $detail)
                                @php
                                    $hargaAsli = $detail->barang->harga;
                                    $diskon = $detail->barang->diskon ?? 0;
                                    $hargaDiskon = $hargaAsli - ($hargaAsli * $diskon / 100);
                                @endphp
                                <tr style="vertical-align: middle; background-color: #fff; border-radius: 20px; box-shadow: 0 2px 6px rgba(0,0,0,0.1); margin-bottom: 12px;">
                                    <td style="text-align: left; white-space: normal; word-wrap: break-word; font-weight: 700; color: #4a3c3c; padding: 20px 15px;">
                                        {{ $detail->barang->nama_barang }}
                                    </td>
                                    <td class="text-center font-weight-bold" style="padding: 20px 15px;">
                                        {{ $detail->jumlah }}
                                    </td>
                                    <td class="text-right text-muted" style="padding: 20px 15px;">
                                        Rp {{ number_format($hargaAsli, 0, ',', '.') }}
                                    </td>
                                    <td class="text-center text-primary font-weight-bold" style="padding: 20px 15px;">
                                        {{ $diskon }}%
                                    </td>
                                    <td class="text-right font-weight-bold" style="color: #2f6627; padding: 20px 15px;">
                                        Rp {{ number_format($hargaDiskon, 0, ',', '.') }}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="text-center w-100" style="font-size: 3rem; font-weight: 800; color: #000000;">
            Total Pembayaran: 
            <span class="badge bg-success px-5 py-4" style="font-size: 2.5rem;">
                Rp {{ number_format($pesanan->total, 0, ',', '.') }}
            </span>
        </div>

        <div class="text-center mt-4">
            <a href="{{ route('home') }}"
               class="btn btn-secondary btn-lg px-5 py-3 me-3"
               style="font-size: 1.8rem; border-radius: 15px; text-decoration: none;">
               <i class="fas fa-arrow-left"></i> Kembali
            </a>

            <a href="{{ route('pesanan.cetakStruk', $pesanan->id) }}"
               class="btn btn-danger btn-lg px-5 py-3"
               style="font-size: 1.8rem; border-radius: 15px; text-decoration: none;">
               <i class="fas fa-file-pdf"></i> Unduh Struk
            </a>
        </div>

    @else
        <div class="alert alert-warning text-center w-100" style="font-size: 1.8rem;">
            <i class="fas fa-box-open"></i> Tidak ada barang dalam pesanan ini.
        </div>
    @endif
</div>
@endsection
