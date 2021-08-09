@extends('layouts/main_admin')
@section('css')
<link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />

@endsection

@section('content')
<span class="d-block">
    <a class="btn btn-primary pull-right" href="/admin/siswa/add">Tambah Data Siswa</a>
</span>
<table id="datatablesSimple">
    <thead>
        <tr>
            <th>No</th>
            <th>NIS</th>
            <th>Nama</th>
            <th>Tempat tanggal Lahir</th>
            <th>Alamat</th>
            <th>Email</th>
            <th>Action</th>
        </tr>
    </thead>
    <tfoot>
        <tr>
            <th>No</th>
            <th>NIS</th>
            <th>Nama</th>
            <th>Tempat tanggal Lahir</th>
            <th>Alamat</th>
            <th>Email</th>
            <th>Action</th>
        </tr>
    </tfoot>
    <tbody>
        @php
            $no=1;
        @endphp
        @foreach ($siswa as $item) 
            <tr>
                <td>{{ $no++ }}</td>
                <td>{{ $item->nis }}</td>
                <td>{{ $item->nama }}</td>
                <td>{{ $item->tempat_lahir.' '.$item->tgl_lahir }}</td>
                <td>{{ $item->alamat }}</td>
                <td>{{ $item->email }}</td>
                <td><a class="btn btn-sm btn-warning" href="/admin/siswa/edit/{{ $item->id }}">Edit</a><a class="btn btn-sm btn-danger" href="/admin/siswa/edit/{{ $item->id }}">Delete</a></td>
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