@extends('layouts.main')

@section('content')

{{-- fitur --}}
<section class="page-section fitur mt-4" id="fitur">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <form action="/prakerin">
                <div class="input-group mb-3">
                    <input id="cari" name="search" type="text" class="form-control" placeholder="katakunci pencarian" aria-label="Recipient's username" aria-describedby="button-addon2">
                    <div class="input-group-append">
                      <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Cari</button>
                    </div>
                </div>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 p-2">
@isset($prakerin)
@foreach ($prakerin as $item)
<div class="card" style="max-width: 100%; margin-top: -1px;">
    <div class="row no-gutters">
        <div class="col-md-2 d-flex align-items-center justify-content-center ">
            @if (!$item->perusahaan->foto == '')
            <img class="img img-fluid" src="{{ asset('foto_uploaded/'.$item->perusahaan->foto) }}" alt="" style="width: 130px">
            @else
            <span class="" style="font-size: 3em; color: Tomato;">
                <i class="fas fa-briefcase fa-2x"></i>
            </span>
            @endif
        </div>
        <div class="col-md-8">
            <div class="card-body">
                <h5 class="card-title">{{ $item->posisi.' | '.$item->perusahaan->nama_perusahaan }}</h5>
                <p class="card-text">{{ $item->deskripsi }}</p>
                {{-- <p class="card-text text-danger"><small class="text-muted">Deadline : {{ $item->tgl_selesai }}</small></p> --}}
                <div class="row p-1">
                    <div class="col-md-3 pl-">
                        <a><i class="fas fa-clock"></i> {{ $item->jenis_prakerin }}</a>
                    </div>
                    <div class="col-md-3 pl-">
                        <a><i class="fas fa-building"></i> {{ $item->bidang }}</a>
                    </div>
                    <div class="col-md-2 pl-">
                        <a><i class="fas fa-map-marker-alt"></i> {{ $item->penempatan }}</a>
                    </div>
                    <div class="col-md-4 pl-">
                        <a><i class="fas fa-stopwatch"></i> Deadline : {{ $item->tgl_selesai }}</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-2 d-flex align-items-center justify-content-center">
            <span class="">
                <a href="/prakerin/detail/{{ $item->id }}" class="btn btn-danger">Lamar >></a>
            </span>
        </div>
    </div>
</div>
@endforeach
@endisset
            </div>
        </div>
        
    </div>
</section>

@endsection
