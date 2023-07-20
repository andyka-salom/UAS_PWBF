
@extends('layouts.app')

@section('title', 'Detil Barang')

@section('content')
<link rel="stylesheet" href="{{ asset('css/styles.css') }}">
<link rel="stylesheet" href="{{ asset('css/beli.css') }}">
<div class="container-page">
    <div class="progress" role="progressbar" aria-label="Danger example" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">
    <div class="progress-bar bg-danger" style="width: 40%"></div> 
    </div>
    <form action="/beli" method="POST">
        
    <div class=" row barang px-5">
        <div class="col-2">
        <img class="img_barang" src="{{ asset('images/logobghitam.png') }}" alt="">
        </div>
        <div class="col-10">
        <h5>Lobster Air Tawar Konsumsi</h5>
        <hr>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Blanditiis nam similique mollitia eius quod nemo a eos id perspiciatis impedit, reiciendis quae ad, commodi quisquam distinctio quis tenetur sit ut!</p>
        <p>Cabang .........</p>
        <p>Harga Satuan : </p>
        <label for="measurement">Satuan:</label>
        <select class="form-select d-inline" aria-label="Default select example" id="measurement" name="measurement" style="background-color:white; color:black;">
            <option value="ekor">Ekor</option>
            <option value="kg">Kg</option>
        </select>
        <label for="quantity">Jumlah:</label>
        <input class="form-control d-inline" type="number" id="quantity" name="quantity" min="1" required>
        Stock Tersedia : 
        </div>
    </div>
    <div class="box-alamat">
    <h5>Alamat Pengiriman</h5>
    <input class="form-control " type="text" id="" name="quantity" required>
    </div>
    
        <button type="submit">Beli</button>
        </form>
</div>
@endsection