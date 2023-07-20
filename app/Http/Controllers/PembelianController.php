<?php
namespace App\Http\Controllers;

use App\Models\Pemesanan;
use Illuminate\Http\Request;

class PembelianController extends Controller
{
    public function riwayatPembelian()
    {
        $user = auth()->user();
        $riwayatPembelian = Pemesanan::where('id_user', $user->id)->get();

        return view('riwayat-pembelian', compact('riwayatPembelian'));
    }
}
