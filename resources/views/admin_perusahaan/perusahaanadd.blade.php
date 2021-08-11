@extends('layouts/main_admin')
@section('css')
@endsection

@section('content')
<div class="row">
    <div class="col-md-8">
        <form action="/admin/perusahaan/addaction" method="post" enctype="multipart/form-data">
            @csrf
            <input class="form-control" name="user_id" id="user_id" type="hidden" value="{{ Auth::guard('user')->user()->id ?? '1' }}">
            <div class="form-floating mb-3">
                <input class="form-control" name="nama_perusahaan" id="nama_perusahaan" type="text" placeholder="" value="{{ old('nama_perusahaan') }}">
                <label for="nama">Nama Perusahaan</label>
            </div>
            <div class="form-floating mb-3">
                <textarea class="form-control" name="alamat" id="alamat" rows="3">{{ old('alamat') }}</textarea>
                <label for="alamat">alamat</label>
            </div>
            <div class="form-floating mb-3">
                <input class="form-control" name="bidang_jasa" id="bidang_jasa" type="text" placeholder="" value="{{ old('bidang_jasa') }}">
                <label for="nama">Bidang Jasa</label>
            </div>
            <div class="form-floating mb-3">
                <textarea class="form-control" name="deskripsi" id="deskripsi" rows="3">{{ old('deskripsi') }}</textarea>
                <label for="alamat">Deskripsi</label>
            </div>
            <div class="form-floating mb-3">
                <input class="form-control" name="email" id="email" type="email" placeholder="" value="{{ old('email') }}">
                <label for="nama">Email Perusahaan</label>
            </div>
            <div class="form-floating mb-3">
                <input class="form-control" name="foto" id="foto" type="file" value="{{ old('foto') }}">
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