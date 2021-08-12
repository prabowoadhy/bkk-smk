@extends('layouts.main')

@section('content')
    
{{-- fitur --}}
<section class="page-section fitur mt-4" id="fitur">
    <div class="container">
      <h4>Semua Perusahaan</h4>
        <div class="row">
            <div class="col-md-9">
                <div class="row">
                  @foreach ($perusahaan as $item)
                  {{-- <div class="col-md-4 "> --}}
                    <div class="card col-md-4 p-1">
                      @if (!$item->foto == '')
                        <img src="{{ url('foto_uploaded/'.$item->foto) }}" class="card-img-top img-thumbnail" alt="...">
                          
                      @else
                        <span class="card-img-top img-thumbnail" style="font-size: 3em; color: Tomato;">
                          <i class="fas fa-briefcase fa-2x card-img-top img-thumbnail"></i>
                        </span>
                      @endif
                      <div class="card-body">
                        <h5 class="card-title"><a href="perusahaan/detail/{{ $item->slug }}">{{ $item->nama_perusahaan }}</a></h5>
                        <p class="card-text">{{ Str::of($item->deskripsi)->limit(100)}}</p>
                      </div>
                    </div>
                  {{-- </div> --}}
                  @endforeach
                  </div>
            </div>
            <div class="col-md-3">
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
