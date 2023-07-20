@extends('layouts.app')

@section('title', 'Partnership')

@section('content')
<link rel="stylesheet" href="{{ asset('css/styles.css') }}">
<h1>Detail Partnership</h1>

<h2>ID: {{ $partnershipshow->id_partnership }}</h2>
<img src="{{ $partnershipshow->foto_partnership }}" alt="Foto Partnership" height="200">
<p>Alamat: {{ $partnershipshow->alamat }}</p>
<p>Deskripsi: {{ $partnershipshow->deskripsi }}</p>
@endsection
