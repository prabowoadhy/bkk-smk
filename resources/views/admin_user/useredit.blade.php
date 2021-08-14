@extends('layouts/main_admin')
@section('css')
@endsection

@section('content')
            <div class="row">
                <div class="col-md-8">
                    <form action="/admin/user/editaction/{{ $user->id }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <input class="form-control" name="id" id="id" type="hidden" value="{{ $user->id }}">
                        
                        <div class="form-floating mb-3">
                            <input class="form-control" name="name" id="name" type="text" value="{{ $user->name }}">
                            <label for="nama">Nama</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input class="form-control" name="email" id="email" type="text" value="{{ $user->email }}">
                            <label for="email">email</label>
                        </div>
                        <div class="form-floating mb-3">
                            <select id="level" name="level" class="form-select" aria-label="Default select example">
                                @foreach (['Superadmin', 'Admin Perusahaan'] as $p)
                                <option value="{{ $p }}" @if ($p === $user->level) selected @endif >{{ $p }}</option>
                                @endforeach
                                </select>
                            <label for="nama">Level</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input class="form-control" name="password" id="password" type="password">
                            <label for="password">password</label>
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
@endsection

@section('js')
@endsection