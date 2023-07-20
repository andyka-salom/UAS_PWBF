@extends('layouts.app')

@section('title', 'Beranda')

@section('content')
<link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <!-- banner --> 
    <div id="carouselExampleDark" class="carousel carousel-dark slide mt-5">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active " data-bs-interval="10000">
    <div class="d-flex justify-content-center">
    <img src="{{ asset('images/lobster.png') }}" class="d-block w-90" alt="...">
    </div>  
    <div class="carousel-caption d-none d-md-block">
        <h5>First slide label</h5>
        <p>Some representative placeholder content for the first slide.</p>
      </div>
    </div>
    <div class="carousel-item" data-bs-interval="2000">
      <div class="d-flex justify-content-center">
    <img src="{{ asset('images/logobghitam.png') }}" class="d-block w-50" alt="...">
    </div>
    <div class="carousel-caption d-none d-md-block">
        <h5>Second slide label</h5>
        <p>Some representative placeholder content for the second slide.</p>
      </div>
    </div>
    <div class="carousel-item">
    <div class="d-flex justify-content-center">
    <img src="{{ asset('images/logobgputih.png') }}" class="d-block w-90" alt="...">
    </div>  
    <div class="carousel-caption d-none d-md-block">
        <h5>Third slide label</h5>
        <p>Some representative placeholder content for the third slide.</p>
      </div>
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
 
    <!-- tentang -->
    <br>
    <br>
    <div class="container-fluid pt-5 pb-5">
      <div class="container">
        <h2 class="display-3 text-center" id="tentang">Judul3</h2>
          <p class="text-center">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Harum, laboriosam hic asperiores neque maiores est. Quis eos facilis ex dolorem, aut temporibus quia fugiat quibusdam, vel, officia molestiae voluptatibus nesciunt?
          </p>
        <div class="clearfix pt-5">
        <img
  src='{{ asset("images/lobster.png") }}'
  class="col-md-6 float-md-end mb-3 crop-img"
  width="300"
  height="300"
/>

          <p class="paragraf1">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Dicta at eaque mollitia dolor quia minus, nulla illum ipsam voluptas beatae quaerat tenetur officiis aperiam temporibus quae saepe quibusdam ullam! Id?
          </p>
          <p class="paragraf2">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Harum perferendis laborum voluptate unde fuga, repellat officiis cupiditate libero a, possimus atque sit doloremque quos accusamus autem. Ab, dolorem! Velit, non.
          </p>
          <p class="paragraf3"> 
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Adipisci dolorum suscipit libero aliquid placeat earum, explicabo voluptatibus? Quidem minima est maiores expedita, nostrum, aliquid dignissimos rerum, velit recusandae a molestiae!
          </p>
          <p class="paragraf4">
            Lorem ipsum dolor, sit amet consectetur adipisicing elit. Accusantium accusamus voluptate ipsum obcaecati fuga, omnis modi, illo nisi labore tempore inventore minima aliquam aperiam libero reprehenderit, sint fugit quis voluptatibus.
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
        <h2 class="display-3" id="hobi">Judul4</h2>
        <p>
          This is a our partnership
        </p>
        <div class="row pt-4 gx-4 gy-4">
          <div class="col-md-4 text-center tim">
          <img src="{{ asset('images/lobster.png') }}" class="rounded-circle mb-3" />
            <h4 id="item">company 1</h4>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. </p>
          </div>
          <div class="col-md-4 text-center tim">
          <img src="{{ asset('images/lobster.png') }}" class="rounded-circle mb-3" />

            <h4 id="item">company 2</h4>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. </p>
          </div>
          <div class="col-md-4 text-center tim">
          <img src="{{ asset('images/lobster.png') }}" class="rounded-circle mb-3" />
            <h4 id="item">company 3</h4>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. </p>
          </div>
        </div>
      </div>
    </div>
    <script src="{{ asset('js/app.js') }}"></script>
@endsection
