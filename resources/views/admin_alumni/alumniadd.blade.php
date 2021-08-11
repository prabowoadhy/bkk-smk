@extends('layouts/main_admin')
@section('css')
@endsection

@section('content')
<div class="row">
    <div class="col-md-8">
        <form action="/admin/alumni/addaction" method="post" enctype="multipart/form-data">
            @csrf
            <input class="form-control" name="id" id="id" type="hidden" placeholder="">
            <div class="form-floating mb-3">
                <input class="form-control" name="nik" id="nik" type="text" placeholder="" value="{{ old('nik') }}">
                <label for="nis">NIK</label>
            </div>
            <div class="form-floating mb-3">
                <input class="form-control" name="nama" id="nama" type="text" placeholder="" value="{{ old('nama') }}">
                <label for="nama">Nama</label>
            </div>
            <div class="form-floating mb-3">
                <input class="form-control" name="tempat_lahir" id="tempat_lahir" type="text" placeholder="" value="{{ old('tempat_lahir') }}">
                <label for="tempat_lahir">tempat_lahir</label>
            </div>
            <div class="form-floating mb-3">
                <input class="form-control" name="tgl_lahir" id="tgl_lahir" type="date" placeholder="" value="{{ old('tgl_lahir') }}">
                <label for="tgl_lahir">tgl_lahir</label>
            </div>
            <div class="form-floating mb-3">
                <textarea class="form-control" name="alamat" id="alamat" rows="3">{{ old('alamat') }}</textarea>
                <label for="alamat">alamat</label>
            </div>
            <div class="form-floating mb-3">
                <input class="form-control" name="email" id="email" type="text" placeholder="" value="{{ old('email') }}">
                <label for="email">email</label>
            </div>
            <div class="form-floating mb-3">
                <input class="form-control" name="password" id="password" type="password" placeholder="">
                <label for="password">password</label>
            </div>
            <div class="form-floating mb-3">
                <input class="form-control" name="foto" id="foto" type="file" placeholder="">
                <label for="foto">foto</label>
            </div>
            <button type="submit">Tambah</button>
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