@extends('layouts.main')

@section('content')
    
{{-- fitur --}}
<section class="page-section fitur mt-4" id="fitur">
    <div class="container">
        <div class="row">
            <div class="col-md-3 p-2">
                <div class="card">
                    <div class="card-body">
                        <h6>Pencarian</h6>
                        <input class="form-control" type="text" name="pencarian" id="pencarian" placeholder="kata kunci">
                        <input class="form-control" type="text" name="pencarian2" id="pencarian2" placeholder="kata kunci">
                        <input class="form-control select2-form" name="jurusan" id="jurusan" >
                        
                    </div>
                </div>
            </div>
            <div class="col-md-9 p-2">
                <div class="alert alert-secondary" role="alert">Menampilkan Semua Lowongan Kerja</div>
                {{-- list job --}}
                @foreach ($loker as $item)
                <div class="card" style="max-width: 100%;">
                    <div class="row no-gutters">
                        <div class="col-md-2 d-flex align-items-center justify-content-center p-2">
                            @if (!$item->foto == '')
                                <img class="img img-fluid" src="{{ asset('foto_uploaded/'.$item->foto) }}" alt="">
                            @else
                            <span class="" style="font-size: 3em; color: Tomato;">
                                <i class="fas fa-briefcase fa-2x"></i>
                            </span>
                            @endif
                        </div>
                        <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">{{ $item->posisi }} | {{ $item->nama_perusahaan }} | {{ $item->penempatan }}</h5>
                            <p class="card-text">{{ $item->deskripsi }}</p>
                            <p class="card-text text-danger"><small class="text-muted">Deadline : {{ $item->tgl_selesai }}</small></p>
                        </div>
                        </div>
                        <div class="col-md-2 d-flex align-items-center justify-content-center">
                        <span class="">
                            <a href="/lowongan/detail/{{ $item->id }}" class="btn btn-danger">Lamar >></a>
                        </span>
                        </div>
                    </div>
                </div>
                    
                @endforeach
                <div class="row mt-5">
                    <div class="col-md-12 d-flex justify-content-center">

                        {{ $loker->links() }}
                    </div>
                </div>
            </div>
        </div>
        
    </div>
    <!-- Modal delete -->
<div class="modal fade" id="authmodal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Maaf</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <p> Silakan Login dulu untuk melamar Kerja / Prakerin </p>
            <input type="hidden" name="id" id="id">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <a type="submit" class="btn btn-danger">Hapus</a>
        </div>
      </div>
    </div>
  </div>
</section>

@endsection

@section('js')
<script>
    $(document).ready(function () {
        $(document).on('click', '.authbtn', function () {
            var id = $(this).val();
            $('#deletemodal').modal('show');
            $('#id').val(id);
        });
    })
</script>
@endsection
