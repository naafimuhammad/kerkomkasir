<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;

class BarangController extends Controller
{
    /**
     * Tampilkan semua barang.
     */
    public function index()
    {
        $barangs = Barang::all(); // Ambil semua data barang
        return view('barang.index', compact('barangs')); // Tampilkan di view barang.index
    }

    /**
     * Tampilkan form tambah barang.
     */
    public function create()
    {
        return view('barang.create'); // Tampilkan form untuk tambah barang
    }

    /**
     * Simpan barang baru ke database.
     */
    public function store(Request $request)
    {
        // Validasi data
        $request->validate([
            'nama_barang' => 'required|string|max:255',
            'harga' => 'required|numeric',
            'diskon' => 'nullable|numeric|min:0|max:100',
            'stok' => 'required|integer|min:0',
        ]);

        // Simpan ke database
        Barang::create([
            'nama_barang' => $request->nama_barang,
            'harga' => $request->harga,
            'diskon' => $request->diskon ?? 0, // default 0 jika tidak diisi
            'stok' => $request->stok,
        ]);

        return redirect()->route('barang.index')->with('success', 'Barang berhasil ditambahkan!');
    }

    /**
     * Tampilkan detail satu barang (opsional).
     */
    public function show($id)
    {
        $barangs = Barang::findOrFail($id);
        return view('barang.show', compact('barang'));
    }

    /**
     * Tampilkan form edit barang.
     */
    public function edit($id)
    {
        $barang = Barang::findOrFail($id);
        return view('barang.edit', compact('barang'));
    }

    /**
     * Simpan perubahan pada barang.
     */
    public function update(Request $request, $id)
    {
        // Validasi data
        $request->validate([
            'nama_barang' => 'required|string|max:255',
            'harga' => 'required|numeric',
            'diskon' => 'nullable|numeric|min:0|max:100',
            'stok' => 'required|integer|min:0',
        ]);

        // Update data
        $barangs = Barang::findOrFail($id);
        $barangs->update([
            'nama_barang' => $request->nama_barang,
            'harga' => $request->harga,
            'diskon' => $request->diskon ?? 0,
            'stok' => $request->stok,
        ]);

        return redirect()->route('barang.index')->with('success', 'Barang berhasil diperbarui!');
    }

    /**
     * Hapus barang dari database.
     */
    public function destroy($id)
    {
        $barangs = Barang::findOrFail($id);
        $barangs->delete();

        return redirect()->route('barang.index')->with('success', 'Barang berhasil dihapus!');
    }
}
