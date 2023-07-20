<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pemesanan;
use App\Models\CabangPenangkaran;
use Auth;

class PemesananController extends Controller
{
    public function index(Request $request)
    {
        if (Auth::check()) {
            $id_user = Auth::id();
            $id_penangkaran = CabangPenangkaran::where('id_user', $id_user)->value('id_penangkaran');
            $pemesanan = Pemesanan::whereHas('barang', function ($query) use ($id_penangkaran) {
                $query->where('id_penangkaran', $id_penangkaran);
            })->get();

            return view('pemesanan', compact('pemesanan'));
        }
    }

    public function updateStatus(Request $request, $id_pemesanan)
    {
        $pemesanan = Pemesanan::findOrFail($id_pemesanan);
        $pemesanan->status_disiapkan = true;
        $pemesanan->save();

        return redirect()->back()->with('success', 'Status Disiapkan berhasil diperbarui.');
    }
}
