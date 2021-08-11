@extends('layouts/main_admin')
@section('css')
@endsection

@section('content')
            <div class="row">
                <div class="col-md-8">
                    <form action="/admin/alumni/editaction/{{ $alumni->id }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <input class="form-control" name="id" id="id" type="hidden" value="{{ $alumni->id }}">
                        <div class="form-floating mb-3">
                            <input class="form-control" name="nik" id="nik" type="text" value="{{ $alumni->nik }}" readonly>
                            <label for="nis">NIK</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input class="form-control" name="nama" id="nama" type="text" value="{{ $alumni->nama }}">
                            <label for="nama">Nama</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input class="form-control" name="tempat_lahir" id="tempat_lahir" type="text" value="{{ $alumni->tempat_lahir }}">
                            <label for="tempat_lahir">tempat_lahir</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input class="form-control" name="tgl_lahir" id="tgl_lahir" type="date" value="{{ $alumni->tgl_lahir }}">
                            <label for="tgl_lahir">tgl_lahir</label>
                        </div>
                        <div class="form-floating mb-3">
                            <textarea class="form-control" name="alamat" id="alamat">{{ $alumni->alamat }}</textarea>
                            <label for="alamat">alamat</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input class="form-control" name="email" id="email" type="text" value="{{ $alumni->email }}">
                            <label for="email">email</label>
                        </div>
                        {{-- <div class="form-floating mb-3">
                            <input class="form-control" name="password" id="password" type="password">
                            <label for="password">password</label>
                        </div> --}}
                        <div class="form-floating mb-3">
                            <div class="row">
                                <div class="col-md-4">
                                    <img src="{{ url('foto_uploaded/'.$alumni->foto) }}" alt="" srcset="" class="img img-fluid">
                                </div>
                                <div class="col-md-6">
                                    <input class="form-control" name="foto" id="foto" type="file">
                                </div>
                            </div>
                        </div>
                        <button class="btn " type="submit">Simpan</button>
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
@endsection

@section('js')
@endsection