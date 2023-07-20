@extends('layouts.app')

@section('title', 'Partnership')

@section('content')<link rel="stylesheet" href="{{ asset('css/styles.css') }}">
<link rel="stylesheet" href="{{ asset('css/part.css') }}">

<div class="card-container">
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
