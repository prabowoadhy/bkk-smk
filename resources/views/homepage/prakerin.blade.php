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
                <div class="alert alert-secondary" role="alert">Menampilkan Semua Lowongan Prakerin</div>
                {{-- list job --}}
                <div class="card" style="max-width: 100%;">
                    <div class="row no-gutters">
                        <div class="col-md-2 d-flex align-items-center justify-content-center">
                        <span class="" style="font-size: 3em; color: Tomato;">
                            <i class="fas fa-briefcase fa-2x"></i>
                        </span>
                        </div>
                        <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">Prakerin Title 1</h5>
                            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                            <p class="card-text text-danger"><small class="text-muted">Deadline : </small></p>
                        </div>
                        </div>
                        <div class="col-md-2 d-flex align-items-center justify-content-center">
                        <span class="">
                            <a href="#" class="btn btn-danger">Lamar >></a>
                        </span>
                        </div>
                    </div>
                </div>

                <div class="card" style="max-width: 100%;">
                    <div class="row no-gutters">
                        <div class="col-md-2 d-flex align-items-center justify-content-center">
                        <span class="" style="font-size: 3em; color: Tomato;">
                            <i class="fas fa-briefcase fa-2x"></i>
                        </span>
                        </div>
                        <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">Prakerin Title 2</h5>
                            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                            <p class="card-text text-danger"><small class="text-muted">Deadline : </small></p>
                        </div>
                        </div>
                        <div class="col-md-2 d-flex align-items-center justify-content-center">
                        <span class="">
                            <a href="#" class="btn btn-danger">Lamar >></a>
                        </span>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        
    </div>
</section>

@endsection
