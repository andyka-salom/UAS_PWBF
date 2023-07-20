@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <div class="container">
        <h1>Riwayat Penjualan</h1>

        @if(count($riwayatPenjualan) > 0)
            <table class="table">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Nama Barang</th>
                        <th>Jumlah Pemesanan</th>
                        <th>Tanggal Pemesanan</th>
                        <th>Tanggal Pengiriman</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($riwayatPenjualan as $index => $penjualan)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $penjualan->barang->nama_barang }}</td>
                            <td>{{ $penjualan->jumlah_pemesanan }}</td>
                            <td>{{ $penjualan->tgl_pemesanan }}</td>
                            <td>{{ $penjualan->tgl_pengiriman }}</td>
                            <td>{{ $penjualan->status_penerimaan ? 'Sudah Diterima' : 'Belum Diterima' }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p>Tidak ada riwayat penjualan yang telah diterima.</p>
        @endif
    </div>
@endsection
