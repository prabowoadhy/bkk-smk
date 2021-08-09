@extends('layouts/main_admin')
@section('css')
@endsection

@section('content')
            <div class="row">
                <div class="col-md-8">
                    <form action="/admin/siswa/actionupdate/{{ $siswa->id }}" method="post">
                        @csrf
                        <input class="form-control" name="id" id="id" type="hidden" placeholder="">
                        <div class="form-floating mb-3">
                            <input class="form-control" name="nis" id="nis" type="text" value="{{ $siswa->nis }}" readonly>
                            <label for="nis">NIS</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input class="form-control" name="nama" id="nama" type="text" value="{{ $siswa->nama }}">
                            <label for="nama">Nama</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input class="form-control" name="tempat_lahir" id="tempat_lahir" type="text" value="{{ $siswa->tempat_lahir }}">
                            <label for="tempat_lahir">tempat_lahir</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input class="form-control" name="tgl_lahir" id="tgl_lahir" type="date" value="{{ $siswa->tgl_lahir }}">
                            <label for="tgl_lahir">tgl_lahir</label>
                        </div>
                        <div class="form-floating mb-3">
                            <textarea class="form-control" name="alamat" id="alamat">{{ $siswa->alamat }}</textarea>
                            <label for="alamat">alamat</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input class="form-control" name="email" id="email" type="text" value="{{ $siswa->email }}">
                            <label for="email">email</label>
                        </div>
                        {{-- <div class="form-floating mb-3">
                            <input class="form-control" name="password" id="password" type="password">
                            <label for="password">password</label>
                        </div> --}}
                        <div class="form-floating mb-3">
                            <input class="form-control" name="foto" id="foto" type="file">
                            <label for="foto">foto</label>
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