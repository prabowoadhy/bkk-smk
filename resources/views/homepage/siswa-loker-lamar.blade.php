@extends('layouts.main')

@section('styles')
<link href="{{ asset('assets/css/sidebars.css') }}" rel="stylesheet">
@endsection

@section('content')

<section class="page-section mt-4">
    <div class="container">
        <div class="row mt-2">
            {{-- <div class="col-md-12"> --}}
                <h4 class="mt-2">{{ $prakerin->posisi }}</h4>
            {{-- </div> --}}
        </div>
        <div class="row mt-2">
            <div class="col-md-9 mt-2">
                <div class="row">
                    <div class="card">
                        <div class="card-header">
                            <div class="row p-1">
                                <div class="col-md-3 pl-">
                                    <a><i class="fas fa-clock"></i> {{ $prakerin->jenis_loker }}</a>
                                </div>
                                <div class="col-md-3 pl-">
                                    <a><i class="fas fa-building"></i> {{ $prakerin->bidang }}</a>
                                </div>
                                <div class="col-md-2 pl-">
                                    <a><i class="fas fa-map-marker-alt"></i> {{ $prakerin->penempatan }}</a>
                                </div>
                                <div class="col-md-4 pl-">
                                    <a><i class="fas fa-stopwatch"></i> Deadline : {{ $prakerin->tgl_selesai }}</a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <p>{{ $prakerin->deskripsi }}</p>
                        </div>
                    </div>
                    <div class="col-md-12 mt-4">
                        <img class="img img-fluid" style="height: 50px" src="{{ asset('foto_uploaded/'.$prakerin->foto) }}" alt="">
            {{ $prakerin->nama_perusahaan }}
                    </div>
                    
                </div>            
            </div>
            <div class="col-md-3 mt-2">
                <div class="card mb-4">
                    @if (Auth::guard('siswa'))
                    <div class="card-header">
                        Lamar Sekarang
                    </div>
                    <div class="card-body">
                        <form action="/siswalamaraction" method="post">
                            @csrf
                        <input class="form-control" type="text" name="id_prakerin" id="id_prakerin" value="{{ $prakerin->id }}" hidden>
                        <input class="form-control" type="text" name="id_pelamar" id="id_pelamar" value="{{ $user->id }}" hidden>
                        <label for="motivasi"> Motivasi</label>
                        <textarea class="form-control" type="text" name="catatan_pelamar" id="catatan_pelamar" style="height: 200px"></textarea>
                        <button class="btn btn-sm btn-primary" type="submit">Lamar Loker</button>
                        </form>
                    </div>
                    @else
                    <a class="btn btn-danger" href="/prakerin/details/{{ $loker->id }}?login=true" class="btn btn-success">Silakan Login Untuk Melamar</a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('scripts')
@endsection