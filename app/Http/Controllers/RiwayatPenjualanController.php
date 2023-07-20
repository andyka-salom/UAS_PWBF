<?php

namespace App\Http\Controllers;

use App\Models\Pemesanan;
use Illuminate\Http\Request;

class RiwayatPenjualanController extends Controller
{
    public function index()
    {
        $riwayatPenjualan = Pemesanan::where('status_pengiriman', true)->get();
        return view('riwayat-penjualan', compact('riwayatPenjualan'));
    }
}
