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
                @if (session('message'))
                        <div class="alert alert-success d-flex align-items-center" role="alert">
                            <i class="fas fa-check"></i>
                            <div>{{ ' '.session('message') }}</div>
                          </div>
                            
                        @endif
                <div class="card">
                    <div class="card-header">
                        Profil Siswa
                    </div>
                    <div class="card-body">
                        <div class="row">
                        <div class="col-md-8">
                            <form action="/siswa/actionupdate/{{ $siswa->id }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <input class="form-control" name="id" id="id" type="hidden" value="{{ $siswa->id }}">
                                <div class="form-group mb-3">
                                    <label for="nis">NIS</label>
                                    <input class="form-control" name="nis" id="nis" type="text" value="{{ $siswa->nis }}" readonly>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="nama">Nama</label>
                                    <input class="form-control" name="nama" id="nama" type="text" value="{{ $siswa->nama }}">
                                </div>
                                <div class="form-group mb-3">
                                    <label for="tempat_lahir">tempat_lahir</label>
                                    <input class="form-control" name="tempat_lahir" id="tempat_lahir" type="text" value="{{ $siswa->tempat_lahir }}">
                                </div>
                                <div class="form-group mb-3">
                                    <label for="tgl_lahir">tgl_lahir</label>
                                    <input class="form-control" name="tgl_lahir" id="tgl_lahir" type="date" value="{{ $siswa->tgl_lahir }}">
                                </div>
                                <div class="form-group mb-3">
                                    <label for="alamat">alamat</label>
                                    <textarea class="form-control" name="alamat" id="alamat">{{ $siswa->alamat }}</textarea>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="email">email</label>
                                    <input class="form-control" name="email" id="email" type="text" value="{{ $siswa->email }}">
                                </div>
                                {{-- <div class="form-floating mb-3">
                                    <input class="form-control" name="password" id="password" type="password">
                                    <label for="password">password</label>
                                </div> --}}
                                <div class="row">
                                    <div class="col-md-6">
                                        <input class="form-control" name="foto" id="foto" type="file">
                                    </div>
                                    <div class="col-md-4">
                                        <img src="{{ url('foto_uploaded/'.$siswa->foto) }}" alt="" srcset="" class="img img-fluid">
                                    </div>
                                {{-- <label for="foto">foto</label> --}}
                                </div>
                                <button class="btn btn-primary" type="submit">Simpan</button>
                            </form>
                        </div>
                        <div class="col-md-4">
                            @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        </div>
                        </div>
                    </div>
                </div>
                                  
            </div>
        </div>
    </div>
</section>
@endsection