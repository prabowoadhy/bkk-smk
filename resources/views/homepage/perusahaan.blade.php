@extends('layouts.main')

@section('content')
    
{{-- fitur --}}
<section class="page-section fitur mt-4" id="fitur">
    <div class="container">
      <h4>Semua Perusahaan</h4>
        <div class="row">
            <div class="col-md-9 p-2">
                <div class="card-group">
                    <div class="card">
                      <img src="{{ asset('assets/img/portfolio/cabin.png') }}" class="card-img-top img-thumbnail" alt="...">
                      <div class="card-body">
                        <h5 class="card-title"><a href="perusahaan/detail">Nama Perusahaan 1</a></h5>
                        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                        
                      </div>
                    </div>
                    <div class="card">
                      <img src="{{ asset('assets/img/portfolio/cake.png') }}" class="card-img-top" alt="...">
                      <div class="card-body">
                        <h5 class="card-title"><a href="perusahaan/detail">Nama Perusahaan 2</a></h5>
                        <p class="card-text">This card has supporting text below as a natural lead-in to additional content.</p>
                        
                      </div>
                    </div>
                    <div class="card">
                      <img src="{{ asset('assets/img/caption-thumb.png') }}" class="card-img-top img-fluid" alt="...">
                      <div class="card-body">
                        <h5 class="card-title"><a href="perusahaan/detail">Nama Perusahaan 3</a></h5>
                        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This card has even longer content than the first to show that equal height action.</p>
                        
                      </div>
                    </div>
                  </div>
            </div>
            <div class="col-md-3 p-2">
              <div class="card">
                <div class="card-body">
                  <h6>Widget</h6>
                  <ul class="nav">
                      <li class="nav-item">
                        <a class="nav-link active" href="#">Active</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="#">Link</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="#">Link</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
                      </li>
                    </ul>
                </div>
              </div>
              
            </div>
        </div>
        
    </div>
</section>

@endsection
