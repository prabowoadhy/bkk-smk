@extends('layouts/main_admin')
@section('css')
<link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
@endsection

@section('content')
<span class="d-block">
    <a class="btn btn-primary pull-right" href="/admin/user/addform">Tambah Data</a>
</span>
<table id="datatablesSimple">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Level</th>
            <th>Action</th>
        </tr>
    </thead>
    <tfoot>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Level</th>
            <th>Action</th>
        </tr>
    </tfoot>
    <tbody>
        @php
            $no=1;
        @endphp
        @foreach ($user as $item) 
            <tr>
                <td>{{ $no++ }}</td>
                <td>{{ $item->name }}</td>
                <td>{{ $item->email }}</td>
                <td>{{ $item->level }}</td>
                <td>
                    <a class="btn btn-sm btn-warning" href="/admin/user/editform/{{ $item->id }}">Edit</a>
                    <button type="button" value="{{ $item->id }}" id="deletebtn" class="btn btn-sm btn-danger deletebtn">
                        Delete
                      </button>
                </td>
            </tr>

        @endforeach
        
    </tbody>
</table>
<!-- Modal delete -->
<div class="modal fade" id="deletemodal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Konfirmasi</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="/admin/user/delete" method="post">
            @csrf
            @method('DELETE')
            <p> Yakin ingin Menghapus ?</p>
            <input type="hidden" name="id" id="id">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-danger">Hapus</button>
            </form>
        </div>
      </div>
    </div>
  </div>
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
<script>
    $(document).ready(function () {
        $(document).on('click', '.deletebtn', function () {
            var id = $(this).val();
            $('#deletemodal').modal('show');
            $('#id').val(id);
        });
    })

</script>
@endsection