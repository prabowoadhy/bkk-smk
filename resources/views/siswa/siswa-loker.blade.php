@extends('layouts.main')

@section('styles')
<link href="{{ asset('assets/css/sidebars.css') }}" rel="stylesheet">
@endsection

@section('content')

<section class="page-section mt-4">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3">
                @include('layouts.sidebars')
            </div>
        <div class="col-md-9">
            <div class="alert alert-secondary" role="alert">Menampilkan Semua Lamaran Kerja yang telah diajukan.</div>
                    {{-- list job --}}
                    @foreach ($lamaran as $item)
                    <div class="card" style="max-width: 100%;">
                        <div class="row no-gutters pl-2">
                            <div class="col-md-1 d-flex align-items-center justify-content-center">
                            <span class="" style="font-size: 3em; color: Tomato;">
                                <img class="img img-fluid" src="{{ asset('foto_uploaded/'.$item->loker->perusahaan->foto) }}" style="height: 75px">
                            </span>
                            </div>
                            <div class="col-md-9">
                            <div class="card-body">
                                <h5 class="card-title">{{ $item->loker->posisi.' | '.$item->loker->perusahaan->nama_perusahaan }}</h5>
                                <p class="card-text">{{ $item->catatan_pelamar }}</p>
                                <p class="card-text text-danger"><small class="text-muted">Tanggal lamar : {{ $item->created_at }}</small></p>
                            </div>
                            </div>
                            <div class="col-md-2 d-flex align-items-center justify-content-center">
                            <span class="">
                                <a href="#" class="btn btn-danger">Batalkan Lamaran</a>
                            </span>
                            </div>
                        </div>
                    </div>
                        
                    @endforeach

        </div>
        </div>
    </div>
</section>
@endsection

@section('scripts')
{{-- <script src="{{ asset('assets/js/sidebars.js') }}"></script> --}}
@endsection