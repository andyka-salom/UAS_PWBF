<?php

namespace App\Http\Controllers;

use App\Models\CabangPenangkaran;
use App\Models\StockBarang;
use App\Models\Pemesanan;
use Illuminate\Http\Request;

class BelanjaController extends Controller
{
    public function index()
    {
        $cabang = CabangPenangkaran::all();
        $barang = StockBarang::all();

        return view('belanja', compact('cabang', 'barang'));
    }

    public function pesan(Request $request)
{
    $request->validate([
        'cabang' => 'required',
        'barang' => 'required',
        'deskripsi' => 'required',
        'harga' => 'required',
        'jumlah_tersedia' => 'required',
        'alamat_pengiriman' => 'required',
        'tgl_pemesanan' => 'required|date',
        'tgl_pengiriman' => 'required|date',
        'jumlah' => 'required|numeric|min:1',
        'bukti_tf' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        'nomor_rekening' => 'required',
    ]);

    $pemesanan = new Pemesanan;
    $pemesanan->id_user = auth()->user()->id;
    $pemesanan->id_barang = $request->barang;
    $pemesanan->tgl_pemesanan = $request->tgl_pemesanan;
    $pemesanan->tgl_pengiriman = $request->tgl_pengiriman;
    $pemesanan->jumlah_pemesanan = $request->jumlah;
    $pemesanan->total_pembayaran = $request->harga * $request->jumlah;
    $pemesanan->alamat_pengiriman = $request->alamat_pengiriman;
    $pemesanan->deskripsi_pemesanan = $request->deskripsi;
    $pemesanan->status_pengiriman = false;
    $pemesanan->status_penerimaan = false;

    // Kurangi jumlah stok barang
    $barang = StockBarang::findOrFail($request->barang);
    $barang->jumlah_barang -= $request->jumlah;
    $barang->save();

    if ($request->hasFile('bukti_tf')) {
        $file = $request->file('bukti_tf');
        $fileName = time() . '_' . $file->getClientOriginalName();
        $file->move(public_path('uploads'), $fileName);
        $pemesanan->bukti_transfer = $fileName;
    }

    $pemesanan->save();

    return redirect()->back()->with('success', 'Pesanan berhasil dibuat');
}

    

    public function fetchBarang($cabangId)
    {
        $barang = StockBarang::where('id_penangkaran', $cabangId)->get();

        return response()->json($barang);
    }

    public function fetchBarangDetail($barangId)
    {
        $barang = StockBarang::findOrFail($barangId);
    
        return response()->json([
            'deskripsi' => $barang->deskripsi,
            'harga' => $barang->harga,
            'jumlah_tersedia' => $barang->jumlah_barang,
            'gambar' => $barang->gambar,
        ]);
    }
    public function fetchNomorRekening($cabangId)
{
    $cabang = CabangPenangkaran::findOrFail($cabangId);

    return response()->json([
        'nomor_rekening' => $cabang->nomor_rekening,
    ]);
}
}
