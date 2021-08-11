@extends('layouts/main_admin')
@section('css')
<link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
@endsection

@section('content')
<span class="d-block">
    <a class="btn btn-primary pull-right" href="/admin/loker/addform">Tambah Data</a>
</span>
<table id="datatablesSimple">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Perusahaan</th>
            <th>Posisi Lowongan</th>
            <th>Bidang</th>
            <th>Tanggal Tutup</th>
            <th>Penempatan</th>
            <th>Jenis Loker</th>
            <th>Action</th>
        </tr>
    </thead>
    <tfoot>
        <tr>
            <th>No</th>
            <th>Nama Perusahaan</th>
            <th>Posisi Lowongan</th>
            <th>Bidang</th>
            <th>Tanggal Tutup</th>
            <th>Penempatan</th>
            <th>Jenis Loker</th>
            <th>Action</th>
        </tr>
    </tfoot>
    <tbody>
        @php
            $no=1;
        @endphp
        @foreach ($loker as $item) 
            <tr>
                <td>{{ $no++ }}</td>
                <td>{{ $item->nama_perusahaan }}</td>
                <td>{{ $item->posisi }}</td>
                <td>{{ $item->bidang }}</td>
                <td>{{ $item->tgl_selesai }}</td>
                <td>{{ $item->penempatan }}</td>
                <td>{{ $item->jenis_loker }}</td>
                <td><a class="btn btn-sm btn-warning" href="/admin/loker/editform/{{ $item->id }}">Edit</a><a class="btn btn-sm btn-danger" href="/admin/loker/pelamar/{{ $item->id }}">Pelamar</a></td>
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