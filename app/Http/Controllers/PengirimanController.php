<?php

namespace App\Http\Controllers;

use App\Models\Pemesanan;
use Illuminate\Http\Request;

class PengirimanController extends Controller
{
    public function index()
    {
        $pemesanan = Pemesanan::where('status_disiapkan', true)->get();
        return view('pengiriman', compact('pemesanan'));
    }

    public function update(Request $request, $id)
    {
        $pemesanan = Pemesanan::findOrFail($id);
        if ($request->has('status_pengiriman')) {
            $pemesanan->status_pengiriman = true;
        }
        if ($request->has('status_penerimaan')) {
            $pemesanan->status_penerimaan = true;
        }
        $pemesanan->save();
        return redirect()->back()->with('success', 'Status pengiriman berhasil diperbarui.');
    }
}
