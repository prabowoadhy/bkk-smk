@extends('layouts.main')

@section('styles')
<link href="{{ asset('assets/css/sidebars.css') }}" rel="stylesheet">
@endsection

@section('content')

<section class="page-section mt-4">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3">
                @include('layouts.sidebars-perusahaan')
            </div>
        <div class="col-md-9">
            <div class="alert alert-secondary" role="alert">Menampilkan Semua Lamaran Kerja yang telah diajukan.</div>
                    {{-- list job --}}
                    @include('_partials._lokerdetail')
                    <div class="card" style="max-width: 100%;">
                        <div class="row no-gutters">
                            <div class="col-md-2 d-flex align-items-center justify-content-center">
                            <span class="" style="font-size: 3em; color: Tomato;">
                                <i class="fas fa-user "></i>
                            </span>
                            </div>
                            <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title">Nama Siswa</h5>
                                <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                                <p class="card-text text-danger"><small class="text-muted">Deadline : </small></p>
                            </div>
                            </div>
                            <div class="col-md-2 text-right text-middle">
                                <a href="#" class="btn btn-success mt-2">Hubungi Melalui WA</a> <br>
                                <a href="#" class="btn btn-warning mt-2">Hubungi Melalui Email</a>
                            </div>
                        </div>
                    </div>

                    <div class="card" style="max-width: 100%;">
                        <div class="row no-gutters">
                            <div class="col-md-2 d-flex align-items-center justify-content-center">
                            <span class="" style="font-size: 3em; color: Tomato;">
                                <i class="fas fa-user "></i>
                            </span>
                            </div>
                            <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title">Nama Siswa</h5>
                                <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                                <p class="card-text text-danger"><small class="text-muted">Deadline : </small></p>
                            </div>
                            </div>
                            <div class="col-md-2 text-right text-middle">
                                <a href="#" class="btn btn-success mt-2">Hubungi Melalui WA</a> <br>
                                <a href="#" class="btn btn-warning mt-2">Hubungi Melalui Email</a>
                            </div>
                        </div>
                    </div>
                                
        </div>
        </div>
    </div>
</section>
@endsection

@section('scripts')
{{-- <script src="{{ asset('assets/js/sidebars.js') }}"></script> --}}
@endsection