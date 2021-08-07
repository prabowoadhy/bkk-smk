@extends('layouts.main')

@section('content')
    
<!-- Masthead-->
<header class="masthead head-main text-white text-center">
    {{-- <img src="{{ asset('') }}assets/img/smkn-5-surabaya1556287713.jpg" alt=""> --}}
    <div class="container d-flex align-items-center flex-column">
        <!-- Masthead Avatar Image-->
        <img class="masthead-avatar mb-5" src="{{ asset('') }}assets/img/avataaars.svg" alt="..." />
        <!-- Masthead Heading-->
        <h1 class="masthead-heading text-uppercase mb-0">Bursa Kerja Khusus</h1>
        <!-- Icon Divider-->
        <div class="divider-custom divider-light">
            <div class="divider-custom-line"></div>
            <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
            <div class="divider-custom-line"></div>
        </div>
        <!-- Masthead Subheading-->
        <p class="masthead-subheading font-weight-light mb-0">Temukan Karirmu, Gemilang Masa Depanmu</p>
    </div>
</header>

{{-- fitur --}}
<section class="page-section fitur" id="fitur">
    <div class="container">
        <h3 class="text-center">Yang Bisa Kamu Lakukan Di BKK Online</h3>
        <!-- Icon Divider-->
        <div class="divider-custom">
            <div class="divider-custom-line"></div>
            <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
            <div class="divider-custom-line"></div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-3">
                <figure class="figure">
                    <img src="{{ asset('') }}assets/img/portfolio/cabin.png" class="figure-img img-fluid rounded" alt="...">
                    <figcaption class="figure-caption text-center">Lamaran Online</figcaption>
                  </figure>
            </div>
            <div class="col-md-3">
                <figure class="figure">
                    <img src="{{ asset('') }}assets/img/portfolio/circus.png" class="figure-img img-fluid rounded" alt="...">
                    <figcaption class="figure-caption text-center">Pantau Lamaran</figcaption>
                  </figure>
            </div>
            <div class="col-md-3">
                <figure class="figure">
                    <img src="{{ asset('') }}assets/img/portfolio/game.png" class="figure-img img-fluid rounded" alt="...">
                    <figcaption class="figure-caption text-center">Tracer Study</figcaption>
                  </figure>
            </div>
            <div class="col-md-3">
                <figure class="figure">
                    <img src="{{ asset('') }}assets/img/portfolio/safe.png" class="figure-img img-fluid rounded" alt="...">
                    <figcaption class="figure-caption text-center">Perusahaan</figcaption>
                  </figure>
            </div>
        </div>

    </div>
</section>


<!-- About Section-->
<section class="page-section bg-primary text-white mb-0" id="about">
    <div class="container">
        <!-- About Section Heading-->
        <h2 class="page-section-heading text-center text-uppercase text-white">About</h2>
        <!-- Icon Divider-->
        <div class="divider-custom divider-light">
            <div class="divider-custom-line"></div>
            <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
            <div class="divider-custom-line"></div>
        </div>
        <!-- About Section Content-->
        <div class="row">
            <div class="col-lg-4 ms-auto"><img src="{{ asset('') }}assets/img/caption-thumb.png" alt="" class="img-fluid"></div>
            <div class="col-lg-4 me-auto">
                <p class="lead">Integrasi, sinergi dan kolaborasi untuk bantu temukan karir anak negeri. Bersama untuk membantu menemukan lowongan yang sesuai bagi berkembangnya karir masa depan anak bangsa.</p>
                <a class="btn btn-xl btn-outline-light" href="#">
                    <i class="fas fa-sign-in me-2"></i>
                    Mulai !
                </a>
            </div>
        </div>
    </div>
</section>
@endsection