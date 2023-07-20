
@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <h1>Daftar Pemesanan untuk Pengiriman</h1>
    <table>
        <thead>
            <tr>
                <th>ID Pemesanan</th>
                <th>Tanggal Pemesanan</th>
                <th>Tanggal Pengiriman</th>
                <th>Jumlah Pemesanan</th>
                <th>Total Pembayaran</th>
                <th>Alamat Pengiriman</th>
                <th>Deskripsi Pemesanan</th>
                <th>Status Pengiriman</th>
                <th>Status Penerimaan</th>
                <th>Bukti Transfer</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pemesanan as $pesan)
                <tr>
                    <td>{{ $pesan->id_pemesanan }}</td>
                    <td>{{ $pesan->tgl_pemesanan }}</td>
                    <td>{{ $pesan->tgl_pengiriman }}</td>
                    <td>{{ $pesan->jumlah_pemesanan }}</td>
                    <td>{{ $pesan->total_pembayaran }}</td>
                    <td>{{ $pesan->alamat_pengiriman }}</td>
                    <td>{{ $pesan->deskripsi_pemesanan }}</td>
                    <td>{{ $pesan->status_pengiriman ? 'Proses Kirim' : 'Belum Dikirim' }}</td>
                    <td>{{ $pesan->status_penerimaan ? 'Barang Diterima' : 'Belum Diterima' }}</td>
                    <td>{{ $pesan->bukti_transfer }}</td>
                    <td>
                        <form action="{{ route('pengiriman.update', $pesan->id_pemesanan) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <button type="submit" name="status_pengiriman" value="true">Proses Kirim</button>
                            <button type="submit" name="status_penerimaan" value="true">Barang Diterima</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
