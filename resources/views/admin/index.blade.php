@extends('layouts/main_admin')

@section('header_content')
    <div class="col-xl-3 col-md-6">
        <div class="card bg-primary text-white mb-4">
            <div class="card-body"><h2>{{ $loker->count() + $prakerin->count() }} Lowongan</h2></div>
            <div class="card-footer d-flex align-items-center justify-content-between">
                <a class="small text-white stretched-link" href="/admin/loker">Lowongan Kerja/Prakerin</a>
                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="card bg-warning text-white mb-4">
            <div class="card-body"><h2>{{ $perusahaan->count() }} Perusahaan</h2></div>
            <div class="card-footer d-flex align-items-center justify-content-between">
                <a class="small text-white stretched-link" href="/admin/perusahaan">Perusahaan</a>
                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="card bg-success text-white mb-4">
            <div class="card-body"><h2>{{ $siswa->count() }} Siswa</h2></div>
            <div class="card-footer d-flex align-items-center justify-content-between">
                <a class="small text-white stretched-link" href="/admin/siswa">Siswa Terdaftar</a>
                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="card bg-danger text-white mb-4">
            <div class="card-body"><h2>{{ $alumni->count() }} Alumni</h2></div>
            <div class="card-footer d-flex align-items-center justify-content-between">
                <a class="small text-white stretched-link" href="/admin/alumni">Alumni Terdaftar</a>
                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
            </div>
        </div>
    </div>
    
@endsection

@section('content')
<table id="datatablesSimple">
    <thead>
        <tr>
            <th class="text-center">No</th>
            <th class="text-center">Jenis Lowongan</th>
            <th class="text-center">Posisi</th>
            <th class="text-center">Bidang</th>
            <th class="text-center" data-type="date" data-format="YYYY-MM-DD">Tgl Selesai</th>
            <th class="text-center">Penempatan</th>
            <th class="text-center">Perusahaan</th>
            <th class="text-center">Total Pelamar</th>
        </tr>
    </thead>
    <tfoot>
        <tr>
            <th>No</th>
            <th>Jenis Lowongan</th>
            <th>Posisi</th>
            <th>Bidang</th>
            <th>Tgl Selesai</th>
            <th>Penempatan</th>
            <th>Perusahaan</th>
            <th>Total Pelamar</th>
        </tr>
    </tfoot>
    <tbody>
        @php
            $no = 1;
        @endphp
        @foreach ($prakerin as $item)
            <tr>
                <td class="text-center">{{ $no++ }}</td>
                <td>Prakerin</td>
                <td>{{ $item->posisi }}</td>
                <td>{{ $item->bidang }}</td>
                <td>{{ $item->tgl_selesai }}</td>
                <td>{{ $item->penempatan }}</td>
                <td>{{ $item->perusahaan->nama_perusahaan }}</td>
                <td class="text-center"><span class="badge bg-secondary">{{ $item->lamaranprakerin->count() }}</span></td>
            </tr>
        @endforeach
        @foreach ($loker as $item)
            <tr>
                <td class="text-center">{{ $no++ }}</td>
                <td>Pekerjaan</td>
                <td>{{ $item->posisi }}</td>
                <td>{{ $item->bidang }}</td>
                <td>{{ $item->tgl_selesai }}</td>
                <td>{{ $item->penempatan }}</td>
                <td>{{ $item->perusahaan->nama_perusahaan }}</td>
                <td class="text-center"><span class="badge bg-secondary">{{ $item->lamaran->count() }}</span></td>
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

    const datatablesSimple = document.getElementById('datatablesSimple', );
    if (datatablesSimple) {
        new simpleDatatables.DataTable(datatablesSimple);
    }
});
</script>
@endsection