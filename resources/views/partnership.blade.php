@extends('layouts.app')

@section('title', 'Partnership')

@section('content')<link rel="stylesheet" href="{{ asset('css/styles.css') }}">
<link rel="stylesheet" href="{{ asset('css/part.css') }}">

<div class="card-container container d-flex justify-content-center mt-5">
    <div class="text-center">
        <h4 class="text-center mt-5"><b>Jelajahi Partnership Kami!</b></h4>
        <div class="row pt-4 gx-4 gy-4" style="margin-bottom: 10vh">
            <div class="col-md-4 text-center tim">
            <img src="{{ asset('images/DragonHotPot.png') }}" class="rounded-circle mb-3" />
              <h4 id="item">Dragon Hotpot1</h4>
              <p>Restoran chinese food, menyediakan berbagai masakan dengan citarasa khas masakan chinese</p>
            </div>
            <div class="col-md-4 text-center tim">
            <img src="{{ asset('images/SangSeafood.png') }}" class="rounded-circle mb-3" />
  
              <h4 id="item">SangSeafood</h4>
              <p>Restoran Seafood, menyediakan berbagai macam seafood menarik dan di display secara langsung di area resto </p>
            </div>
            <div class="col-md-4 text-center tim">
            <img src="{{ asset('images/rajalobster.png') }}" class="rounded-circle mb-3" />
              <h4 id="item">Raja Lobster</h4>
              <p>Raja Lobster adalah salah satu Mitra kami yang sukses dalam mengembangkan bisnis budidaya lobster airtawar</p>
            </div>
          </div>
    </div>
    @foreach($partnerships as $partnership)
    <div class="card" style="background-image: url('{{ $partnership->foto_partnership }}');">
        <div class="card-details">
            <p class="text-title">{{ $partnership->nama_perusahaan }}</p>
            <p class="text-body">{{ $partnership->lokasi_perusahaan }}</p>
            <div id="details{{ $partnership->id }}" class="details" style="display: none;">
                <p class="text-body">Detail partnership:</p>
                <p class="text-body">Deskripsi: {{ $partnership->deskripsi }}</p>
                <p class="text-body">Alamat: {{ $partnership->alamat }}</p>
            </div>
            <button class="card-button">
  <a href="{{ route('partnership.show', $partnership->id_partnership) }}" style="text-decoration: none; color: white;">
    Details
  </a>
</button>

    
        </div>
    </div>
    @endforeach
</div>

<script>
    function toggleDetails(partnershipId) {
        var details = document.getElementById('details' + partnershipId);
        if (details.style.display === 'none') {
            details.style.display = 'block';
        } else {
            details.style.display = 'none';
        }
    }
</script>

@endsection
