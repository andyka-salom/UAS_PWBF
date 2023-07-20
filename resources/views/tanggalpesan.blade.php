
@extends('layouts.app')

@section('title', 'Detil Barang')

@section('content')
<link rel="stylesheet" href="{{ asset('css/styles.css') }}">
<link rel="stylesheet" href="{{ asset('css/beli.css') }}">
<div class="container-page">
    <div class="progress" role="progressbar" aria-label="Danger example" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">
    <div class="progress-bar bg-danger" style="width: 60%"></div> 
    </div>
    <form action="/beli" method="POST">
        
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
        
        </div>
    </div>
    <div class="box-alamat">
    <h5>Tanggal Pengiriman :</h5>
    <input class="form-control " type="date" id="" name="quantity" required>
    <br>
    <h5>Waktu Pengiriman :</h5>
    <input class="form-control " type="time" id="" name="quantity" required>
    </div>
    
        <button type="submit">Beli</button>
        </form>
</div>
@endsection