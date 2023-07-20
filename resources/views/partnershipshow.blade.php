@extends('layouts.app')

@section('title', 'Partnership')

@section('content')
<link rel="stylesheet" href="{{ asset('css/styles.css') }}">
<div class="container">
    <h1>Detail Partnership</h1>

    <h2>ID: {{ $partnershipshow->id_partnership }}</h2>
    @if ($partnershipshow->id_partnership == 1)
        <img src="{{ asset('images/DragonHotPot.png') }}" alt="Deskripsi Gambar" style="width: 20vh">

    @elseif($partnershipshow->id_partnership == 2)
        <img src="{{ asset('images/SangSeafood.png') }}" alt="Deskripsi Gambar" style="width: 20vh">

    @else
        <img src="{{ asset('images/rajalobster.png') }}" alt="Deskripsi Gambar" style="width: 20vh">

    @endif
    <br><br>
    <p>Alamat: {{ $partnershipshow->alamat }}</p>
    <p>Deskripsi: {{ $partnershipshow->deskripsi }}</p>
</div>
@endsection
