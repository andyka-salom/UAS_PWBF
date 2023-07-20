
@extends('layouts.app')

@section('title', 'Detil Barang')

@section('content')
<link rel="stylesheet" href="{{ asset('css/styles.css') }}">
<link rel="stylesheet" href="{{ asset('css/beli.css') }}">
<div class="container-page">
    <div class="progress" role="progressbar" aria-label="Danger example" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">
    <div class="progress-bar bg-danger" style="width: 100%"></div> 
    </div>
    <form action="/beli" method="POST">
        <div class="d-flex justify-content-center">
        <div class="text-center alert alert-danger" style="width: 100vh" role="alert">
            <h5>Status Pemesanan : Menunggu Pembayaran</h5>
            <b> Lakukan Pembayaran BCA kepada nomor rekening : 
                23453 234235 342242 3</b>
        </div>
    </div>
    <div class=" row barang px-5">
        <div class="col-2">
        <img class="img_barang" src="{{ asset('images/logobghitam.png') }}" alt="">
        </div>
        <div class="col-10">
        <h5>Lobster Air Tawar Konsumsi</h5>
        <hr>
        <p>Cabang .........</p>
        <p>Harga Satuan : </p>
        <p>jumlah satuan : </p>
        <p>Harga Total : </p>
        <p>alamat : </p>
        <p>opsi tambahan :</p>
        <p>Tanggal Pengiriman :</p>
        <p>Waktu Pengiriman :</p>
        <p>Metode Pembayaran : </p>

        </div>
    </div>
    <div class="box-alamat info_pembayaran">
        <h5><b>Manual Pengguna BCA Virtual Account</b></h5>

<p>Cara Membayar di ATM BCA</p>
<pre>
Pada Halaman Utama pilih TRANSAKSI LAINNYA
1.Pilih menu TRANSFER
2.Pilih ke Rekening BCA Virtual Account
3.Masukkan nomor rekening code pembayaran atas
4.Layar konfirmasi muncul, cek kembali data Anda. Jika sudah benar lanjutkan tekan YA.
5.Transaksi selesai. Simpan struk ATM sebagai bukti pembayaran Anda
6.Selesai

Cara Membayar di KlikBCA Individu
1.Pilih menu TRANSFER DANA
2.Pilih Transfer ke BCA Virtual Account
3.Masukkan nomor rekening code pembayaran atas
4.Layar konfirmasi muncul, cek kembali data Anda
5.Lanjutkan transaksi dengan memasukkan respon token sesuai yang diminta
6.Pembayaran selesai

Cara Membayar di KlikBCA Bisnis
1.Lakukan penambahan nomor rekening virtual di menu : Transfer Dana - Daftar Transfer - Tambah
2.Setelah selesai, masuk ke menu Transfer Dana - BCA Virtual Account
3.Pilih rekening sumber dana dan rekening BCA Virtual Account yang dituju
4.Layar konfirmasi muncul, cek kembali data Anda. Tekan simpan agar transaksi masuk ke dalam antrian otorisasi
5.Masuk ke menu Transfer Dana - Otorisasi
6.Pilih transaksi transfer yang akan diotorisasi
7.Masukkan respon token sesuai yang diminta
8.Proses selesai. Pastikan status transaksi Anda berhasil

Cara Membayar di mBCA
1.Pilih menu m-Transfer
2.Pilih BCA Virtual Account
3.Masukkan nomor rekening code pembayaran atas
4.Layar konfirmasi muncul, cek kembali data Anda
5.Lanjutkan transaksi dengan memasukkan PIN m-BCA Anda
6.Pembayaran selesai
</pre>    
</div>
        </form>
</div>
@endsection