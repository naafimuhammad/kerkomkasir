<?php

namespace App\Http\Controllers;

use App\Models\Pesanan;
use App\Models\DetailPesanan;
use App\Models\Barang; 
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class PesananController extends Controller
{
    public function store(Request $request)
    {
        $validatedBarang = collect($request->input('barang'))
            ->filter(fn ($item) => isset($item['jumlah']) && $item['jumlah'] > 0);

        if ($validatedBarang->isEmpty()) {
            return back()->withErrors(['barang' => 'Pilih minimal satu barang yang ingin dipesan.'])->withInput();
        }

        $pesanan = Pesanan::create([
            'user_id' => auth()->id() ?? 1,
            'status' => 'pending',
        ]);

        $total = 0;

        foreach ($validatedBarang as $id => $item) {
            $barang = Barang::find($id);
            if (!$barang) continue;

            if ($item['jumlah'] > $barang->stok) {
                $pesanan->delete();
                return back()->withErrors(["barang.{$id}.jumlah" => "Stok barang {$barang->nama_barang} tidak cukup."])->withInput();
            }

            $hargaDiskon = $barang->harga - ($barang->harga * $barang->diskon / 100);
            $subtotal = $hargaDiskon * $item['jumlah'];
            $total += $subtotal;

            DetailPesanan::create([
                'pesanan_id' => $pesanan->id,
                'barang_id' => $barang->id,
                'jumlah' => $item['jumlah'],
                'subtotal' => $subtotal,
            ]);

            $barang->stok -= $item['jumlah'];
            $barang->save();
        }

        $pesanan->total = $total;
        $pesanan->save();

        return redirect()->route('pesanan.show', $pesanan->id)->with('success', 'Pesanan berhasil disimpan.');
    }

    public function show($id)
    {
        $pesanan = Pesanan::with('detailPesanan.barang')->findOrFail($id);
        return view('pesanan.show', compact('pesanan'));
    }

    public function create()
    {
        $barangs = Barang::all();
        return view('pesanan.create', compact('barangs'));
    }

    public function index()
    {
        $pesanans = Pesanan::all();
        return view('pesanan.index', compact('pesanans'));
    }

    public function cetakStruk($id)
    {
        $pesanan = Pesanan::with('detailPesanan.barang')->findOrFail($id);
        $pdf = Pdf::loadView('pesanan.struk', compact('pesanan'));
        return $pdf->download('struk-pesanan-' . $id . '.pdf');
    }

    public function riwayat()
    {
        // Pakai relasi yang benar sesuai model kamu
        $pesanans = Pesanan::with('detailPesanan.barang')->orderBy('created_at', 'desc')->get();
        return view('pesanan.riwayat', compact('pesanans'));
    }

    public function destroy($id)
    {
        $pesanan = Pesanan::findOrFail($id);
        $pesanan->detailPesanan()->delete();
        $pesanan->delete();

        return redirect()->route('pesanan.riwayat')->with('success', 'Pesanan berhasil dihapus.');
    }
}
