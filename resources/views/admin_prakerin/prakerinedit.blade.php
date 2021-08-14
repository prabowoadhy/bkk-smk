@extends('layouts/main_admin')
@section('css')
@endsection

@section('content')
            <div class="row">
                <div class="col-md-8">
                    <form action="/admin/prakerin/editaction/{{ $prakerin->id }}" method="post">
                        @csrf
                        <input class="form-control" name="user_id" id="user_id" type="hidden" value="{{ Auth::guard('user')->user()->id ?? '1' }}">
                        <div class="form-floating mb-3">
                            <select id="jenis_prakerin" name="jenis_prakerin" class="form-select" aria-label="Default select example">
                                @foreach (['Full Time', 'Part Time'] as $p)
                                <option value="{{ $p }}" @if ($p === $prakerin->jenis_prakerin) selected @endif >{{ $p }}</option>
                                @endforeach
                              </select>
                              <label for="nama">Jenis Prakerin</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input class="form-control" name="posisi" id="posisi" type="text" placeholder="" value="{{ $prakerin->posisi }}">
                            <label for="nama">Posisi Prakerin</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input class="form-control" name="bidang" id="bidang" type="text" placeholder="" value="{{ $prakerin->bidang }}">
                            <label for="nama">Bidang Jasa</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input class="form-control" name="tgl_mulai" id="tgl_mulai" type="date" placeholder="" value="{{ $prakerin->tgl_mulai }}">
                            <label for="nama">Tanggal Mulai</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input class="form-control" name="tgl_selesai" id="tgl_selesai" type="date" placeholder="" value="{{ $prakerin->tgl_selesai }}">
                            <label for="nama">tgl_selesai</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input class="form-control" name="penempatan" id="penempatan" type="text" placeholder="" value="{{ $prakerin->penempatan }}">
                            <label for="nama">penempatan</label>
                        </div>
                        <div class="form-floating mb-3">
                            <textarea class="form-control" name="deskripsi" id="deskripsi">{{ $prakerin->deskripsi }}</textarea>
                            <label for="alamat">Deskripsi</label>
                        </div>
                        <div class="form-floating mb-3">
                            <select id="perusahaan_id" name="perusahaan_id" class="form-select" aria-label="Default select example">
                                @foreach ($perusahaan as $p)
                                <option value="{{ $p->id }}" @if ($p->id === $prakerin->perusahaan_id) selected @endif >{{ $p->nama_perusahaan }}</option>
                                @endforeach
                                </select>
                            <label for="nama">Perusahaan</label>
                        </div>
                        <button class="btn btn-primary" type="submit">Tambah</button>
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