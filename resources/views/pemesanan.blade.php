

@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{ asset('css/styles.css') }}">
<link rel="stylesheet" href="{{ asset('css/pemesanan.css') }}">
<div class="containerpemesanan">
    <h1>Data Pemesanan</h1>
    
    @if ($pemesanan->count() > 0)
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
                    <th>Status Disiapkan</th>
                    <th>Status Pengiriman</th>
                    <th>Status Penerimaan</th>
                    <th>Bukti Transfer</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pemesanan as $pemesan)
                    <tr>
                        <td>{{ $pemesan->id_pemesanan }}</td>
                        <td>{{ $pemesan->tgl_pemesanan }}</td>
                        <td>{{ $pemesan->tgl_pengiriman }}</td>
                        <td>{{ $pemesan->jumlah_pemesanan }}</td>
                        <td>{{ $pemesan->total_pembayaran }}</td>
                        <td>{{ $pemesan->alamat_pengiriman }}</td>
                        <td>{{ $pemesan->deskripsi_pemesanan }}</td>
                        <td>
                            @if ($pemesan->status_disiapkan)
                                Sudah Siap
                            @else
                                Belum Siap
                            @endif
                        </td>
                        <td>
                            @if ($pemesan->status_pengiriman)
                                Sudah Dikirim
                            @else
                                Belum Dikirim
                            @endif
                        </td>
                        <td>
                            @if ($pemesan->status_penerimaan)
                                Sudah Diterima
                            @else
                                Belum Diterima
                            @endif
                        </td>
                        <td>{{ $pemesan->bukti_transfer }}</td>
                        <td>
                            @if (!$pemesan->status_disiapkan)
                                <form action="{{ route('pemesanan.updateStatus', $pemesan->id_pemesanan) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit" class="btn btn-primary">Tandai Sudah Siap</button>
                                </form>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>Tidak ada data pemesanan.</p>
    @endif
</div>
@endsection
