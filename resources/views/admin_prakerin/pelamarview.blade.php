@extends('layouts/main_admin')
@section('css')
<link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
@endsection

@section('header_content')
@include('_partials/_prakerindetail')
    
@endsection

@section('content')
<table id="datatablesSimple">
    <thead>
        <tr>
            <th>No</th>
            <th>Sekolah Asal</th>
            <th>Nama Pelamar</th>
            <th>Tempat Tanggal Lahir</th>
            <th>Alamat</th>
            <th>Hubungi</th>
        </tr>
    </thead>
    <tfoot>
        <tr>
            <th>No</th>
            <th>Sekolah Asal</th>
            <th>Nama Pelamar</th>
            <th>Tempat Tanggal Lahir</th>
            <th>Alamat</th>
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
                <td>{{ $item->siswa->sekolah_asal }}</td>
                <td>{{ $item->siswa->nama }}</td>
                <td>{{ $item->siswa->tempat_lahir.', '.$item->siswa->tgl_lahir }}</td>
                <td>{{ $item->siswa->alamat }}</td>
                {{-- <td><a class="btn btn-sm btn-primary" href="#">Lihat CV</a></td> --}}
                <td>
                    <a class="btn btn-sm btn-success" href="/admin/loker/editform/#">{{ $item->siswa->no_telp }}</a>
                    <a class="btn btn-sm btn-warning" href="/admin/loker/pelamar/#">{{ $item->siswa->email }}</a>
                </td>
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