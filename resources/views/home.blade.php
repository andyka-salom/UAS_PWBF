@extends('layouts.app')

@section('title', 'Beranda')

@section('content')
<link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <!-- banner --> 
    <div id="carouselExampleCaptions" class="carousel slide slide mt-5">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active " data-bs-interval="10000">
    <div class="d-flex justify-content-center">
    <img src="{{ asset('images/lobster thumbnail 3.png') }}" class=" " alt="...">
    </div>  
    <div class="carousel-caption d-none d-md-block">
        <h5>Lobster Air Tawar</h5>
        <p>Kami Selalu Mengutamakan Kualitas dan Keramahan Karyawan Kami</p>
      </div>
    </div>
    <div class="carousel-item" data-bs-interval="2000">
      <div class="d-flex justify-content-center">
    <img src="{{ asset('images/lobster thumbnail 2.png') }}" class="d-block w-90" alt="...">
    </div>
    <div class="carousel-caption d-none d-md-block">
        <h5>Bekerjasama Membangun Negeri</h5>
        <p>Kami telah mengajarkan Budidaya lobster airtawar Kepada ratusan petani yang ada di indonesia</p>
      </div>
    </div>
    <div class="carousel-item">
    <div class="d-flex justify-content-center">
    <img src="{{ asset('images/lobster thumbnail 1.png') }}" class="d-block w-90" alt="...">
    </div>  
    <div class="carousel-caption d-none d-md-block">
        <h5>Kualitas Pakan</h5>
        <p>Kami selalu memakai Pakan dengan Kualitas tinggi</p>
      </div>
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev" style="color: black">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
 
    <!-- tentang -->
    <br>
    <br>
    <div class="container-fluid pt-5 pb-5">
      <div class="container">
        <h2 class="display-3 text-center" id="tentang">LOBSTERINDO</h2>
          <p class="text-center">
            Platform Website pemesanan Lobster Air Tawar. Lobsterindo adalah perusahaan yang berjalan pada bidang agrikultural yang fokus pada pengembangan budidaya lobster airtawar
          </p>
        <div class="clearfix pt-5">
        <img
  src='{{ asset("images/logo png.png") }}'
  class="col-md-6 float-md-end mb-3 crop-img"
  width="300"
  height="300"
/>
          <br><br>
          <p class="text-center">
            Lobsterindo adalah perusahaan yang berjalan di bidang agrikultural yang berfokus dalam Budidaya Lobster Air Tawar, kami berjalan mulai dari tahun 2019 sebagai pembudidaya lobster air tawar rumahan, dan berkembang sebagai perusahaan yang menyediakan layanan pembelajaran untuk berbudidaya lobster air tawar.
          </p>
          <br>
          <p class="text-center">
            Saat ini kami telah menjadi Suplayer Lobster Air Tawar diberbagai Restauran besar yang berada di Jawa Timur dan sekitarnya. Serta kami memiliki berbagai macam cabang yang tersebar di berbagai provinsi mulai dari Jawa Timur, Jawa Tengah, Jawa Barat, Kalimantan Barat, Serta Kalimantan Selatan.
          </p>

        </div>
      </div>
    </div>
    <!-- partnership -->
    <br>
    <br>
    <br>
    <div class="container-fluid pt-5 pb-5 bg-light">
      <div class="container text-center">
        <h2 class="display-3" id="hobi">Partnership</h2>
        <p>
          This is a our partnership
        </p>
        <div class="row pt-4 gx-4 gy-4">
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
    </div>
    <!-- kontak -->
  
    <script src="{{ asset('js/app.js') }}"></script>
@endsection
