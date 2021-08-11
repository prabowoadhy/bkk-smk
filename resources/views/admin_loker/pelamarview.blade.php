@extends('layouts/main_admin')
@section('css')
<link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
@endsection

@section('content')
<table id="datatablesSimple">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Pelamar</th>
            <th>Nama Perusahaan</th>
            <th>Posisi Lowongan</th>
            {{-- <th>Curriculum Vittae</th> --}}
            <th>Hubungi</th>
        </tr>
    </thead>
    <tfoot>
        <tr>
            <th>No</th>
            <th>Nama Pelamar</th>
            <th>Nama Perusahaan</th>
            <th>Posisi Lowongan</th>
            {{-- <th>Curriculum Vittae</th> --}}
            <th>Hubungi</th>
        </tr>
    </tfoot>
    <tbody>
        @php
            $no=1;
        @endphp
        @foreach ($lamaran as $item) 
            <tr>
                <td>{{ $no++ }}</td>
                <td>{{ $item->nama }}</td>
                <td>{{ $item->nama_perusahaan }}</td>
                <td>{{ $item->posisi }}</td>
                {{-- <td><a class="btn btn-sm btn-primary" href="#">Lihat CV</a></td> --}}
                <td><a class="btn btn-sm btn-success" href="/admin/loker/editform/#">{{ $item->no_telp }}</a><a class="btn btn-sm btn-danger" href="/admin/loker/pelamar/#">{{ $item->email }}</a></td>
            </tr>

        @endforeach
        
    </tbody>
</table>
@endsection

@section('js')
<script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
<script>
    window.addEventListener('DOMContentLoaded', event => {
    // Simple-DataTables
    // https://github.com/fiduswriter/Simple-DataTables/wiki

    const datatablesSimple = document.getElementById('datatablesSimple');
    if (datatablesSimple) {
        new simpleDatatables.DataTable(datatablesSimple);
    }
});
</script>
@endsection