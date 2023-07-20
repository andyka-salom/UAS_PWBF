@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <div class="container">
        <h1>Riwayat Pembelian</h1>

        <table class="table">
            <thead>
                <tr>
                    <th>ID Pemesanan</th>
                    <th>Tanggal Pemesanan</th>
                    <th>Total Pembayaran</th>
                    <th>Status Pengiriman</th>
                    <th>Status Penerimaan</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($riwayatPembelian as $pemesanan)
                    <tr>
                        <td>{{ $pemesanan->id_pemesanan }}</td>
                        <td>{{ $pemesanan->tgl_pemesanan }}</td>
                        <td>{{ $pemesanan->total_pembayaran }}</td>
                        <td>{{ $pemesanan->status_pengiriman ? 'Sudah Dikirim' : 'Belum Dikirim' }}</td>
                        <td>{{ $pemesanan->status_penerimaan ? 'Sudah Diterima' : 'Belum Diterima' }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
